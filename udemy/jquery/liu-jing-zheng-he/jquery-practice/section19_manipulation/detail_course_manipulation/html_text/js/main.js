$(function() {
	// btnHtml クリック時の処理
	$("#btnHtml").click(function() {
		console.log($("body").html());
		$("#trgt").html("<b>text</b>");
	});

	// btnText クリック時の処理
	$("#btnText").click(function() {
		console.log($("body").text());
		$("#trgt").text("<b>text</b>");
	});

	// btnEmpty クリック時の処理
	$("#btnEmpty").click(function() {
		$("#trgt").empty();
	});
});
