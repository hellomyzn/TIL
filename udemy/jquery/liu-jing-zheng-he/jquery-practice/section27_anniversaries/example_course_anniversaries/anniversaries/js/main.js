$(function() {
	// 日付の取得
	var getDate = function() {
		var r = {};
		var d = r.raw = new Date();
		r.m = d.getMonth() + 1;
		r.d = d.getDate();
		r.mm = ("0" + r.m).substr(-2);
		r.dd = ("0" + r.d).substr(-2);
		r.str = r.m + "月" + r.d + "日";
		return r;
	};

	// Wikipediaの読み込み
	var loadWikipedia = function(kw) {
		var d = $.Deferred();

		var url = "https://ja.wikipedia.org/w/api.php?action=query&"
			+ "titles=%s%&prop=revisions&rvprop=content&format=json"
			.replace(/%s%/, encodeURIComponent(kw));

		$.ajax({url: url, dataType: "jsonp"})
		.then(function(json) {
			var pages = json.query.pages;
			var keys = Object.keys(pages);
			try {
				var page = pages[keys[0]];	// keysが配列でなければエラー
				var body = page.revisions[0]["*"]	// 存在しなければエラー
					.replace(/\r|<noinclude>[\s\S]*?<\/noinclude>/g, "")
					.replace(/^\n+|\n+$/g, "");
				d.resolve(body);
			} catch(e) {
				d.reject();
			}
		}, d.reject);

		return d.promise();
	};

	// 記念日の切り出し
	var cutoutAnvrsr = function(body, date) {
		var re = new RegExp(
			"== \\[\\[" + date.str + "\\]\\] ==\\n"
			+ "([\\s\\S]+?)(\\n\\n|$)", "");
		var m = body.match(re);
		return (m == null) ? null : m[1];
	};

	// Wikipediaリンク作成
	var genLnkWkpd = function(lnkKw, vwKw) {
		vwKw = (vwKw === undefined) ? lnkKw : vwKw;
		lnkKw = encodeURIComponent(lnkKw);

		var url = "https://ja.wikipedia.org/wiki/" + lnkKw;
		return '<a href="%s" target="_blank">%s</a>'
			.replace("%s", url).replace("%s", vwKw);
	};

	// 記念日をHTMLに
	var anvrsrToHtml = function(t) {
		// リンクの展開
		t = t.replace(/\[\[(.+?)\]\]/g, function(s, s1) {
			var arr = s1.split("|");
			return genLnkWkpd(arr[0], arr[1]);
		});

		// 不要の削除
		t = t.replace(/[(（]*{{.+?}}[）)]*/g, "")
			.replace(/<ref>.+?<\/ref>/g, "")
			.replace(/<!--.+?-->/g, "");
		return t;
	}

	// ---------- 実際の処理はここから開始 ----------
	// 処理
	var date = getDate();	// 日付の取得
	var kw = "Wikipedia:今日は何の日_" + date.m + "月";
	//console.log(date, kw);

	loadWikipedia(kw)	// Wikipediaの読み込み
	.done(function(r) {
		// 項目の作成
		var text = cutoutAnvrsr(r, date);
		var html = anvrsrToHtml(text);
		var arr = $.map(html.split("\n"), function(x) {
			return (x[0] == "*") ? x.substr(1) : "";
		});

		// HTMLの構築
		var $anv = $("#anniversaries").empty().append(
			$("<div>").addClass("anvTtl").text(date.str));

		$.each(arr, function(i, x) {
			$anv.append($("<div>").addClass("anvItm").html(x));
		});
	});
});
