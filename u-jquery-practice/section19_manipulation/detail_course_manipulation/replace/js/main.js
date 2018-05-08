$(function() {
	// btnRepWith クリック時の処理
	$("#btnRepWith").click(function() {
		$("span").replaceWith("<b>置換</b>");
	});

	// btnRepAll クリック時の処理
	$("#btnRepAll").click(function() {
		$("<b>置換</b>").replaceAll("span");
	});

	// btnRepWith2 クリック時の処理
	$("#btnRepWith2").click(function() {
		$("span").replaceWith($("div"));
	});
});
