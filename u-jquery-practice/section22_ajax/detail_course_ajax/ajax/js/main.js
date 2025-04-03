$(function() {
	var url = "http://api.flickr.com/services/feeds/"
			+ "photos_public.gne?jsoncallback=?"
	var data = {tags: "cc0", tagmode: "any", format: "json"};

	// 成功時のimg出力
	var outputImg = function(data, status, jqXHR) {
		console.log(data);
		console.log(status);
		console.log("[done]", jqXHR, jqXHR.statusText);
		$.each(data.items, function(i, itm) {
			$("<img>").attr("src", itm.media.m).appendTo("body");
		});
	};

	// 失敗時の情報出力
	var outputFailInf = function(jqXHR, status, errorThrown) {
		console.log("[fail]", jqXHR, jqXHR.statusText);
		console.log(status);
		console.log(errorThrown);
			// "Not Found"や"Internal Server Error"などの文字列
	};

	// btn1 クリック時の処理
	$("#btn1").click(function() {
		$.ajax(url, {
			data: data,
			dataType: "jsonp",	// 必要
			cache: false,
			timeout: 2000
		})
		.done(outputImg)
		.fail(outputFailInf);
	});

	// btn2 クリック時の処理
	$("#btn2").click(function() {
		$.ajax({
			url: url,
			data: data,
			dataType: "jsonp",	// 必要
			cache: false,
			timeout: 2000
		})
		.done(outputImg)
		.fail(outputFailInf);
	});
});
