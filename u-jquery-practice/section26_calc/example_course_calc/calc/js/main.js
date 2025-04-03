$(function() {

	// 各種よく使う要素は変数に格納しておく
	var $f = $("#formula");
	var pushF = function(c) {$f.val($f.val() + c)};
	var cnt = 1;
	var animHop = function($trgt) {
		$trgt.stop()
		.animate({top: "-8px"}, 100)
		.animate({top: "4px"}, 100)
		.animate({top: "0px"}, 50);
	};

	// ボタンのすき間を削除
	$("div").contents().each(function() {
		// テキストノードなら文字列、それ以外はnull
		var t = "" + this.nodeValue;
		if (t.match(/^[ \t\n]+$/)) {
			$(this).remove();
		}
	});

	// 数字ボタンの処理
	$(".btnN").click(function() {
		var n = $(this).text() * 1;
		pushF(n);
	});

	// 機能ボタンの処理
	$(".btnF").click(function() {
		var c = $(this).text();
		switch (c) {
			case "=": calc();     break;
			case "C": $f.val(""); break;
			default: pushF(c);
		}
	});

	// ボタンのエフェクト
	$(".btnF, .btnN").click(function() {
		animHop($(this).add($f));
	});

	// 計算処理
	var calc = function() {
		// 計算結果を求める
		var f = $f.val();
		var res = "err";
		try {res = eval(f)} catch(e) {}
		$f.val(res);

		// 履歴表示にチェックありなら履歴を追加
		if ($("#hstryUse").prop("checked")) {
			$("<div>")
			.addClass("hstryItm")
			.text(cnt + ": " + f + " = " + res)
			.prependTo("#hstry")
			.hide().fadeIn();
			cnt ++;
			animHop($("#hstry"));
		}

		// 履歴最大数を超えていたら削除
		var max = $("#hstryMax").val() * 1;
		while ($(".hstryItm").length > max) {
			$(".hstryItm:last-child").remove();
		}
	};
});
