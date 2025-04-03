$(function() {
	// リンク クリック時の処理
	$("#lnk").click(function() {
		var href = $(this).attr("href");
		console.log(href);
		return false;
	});

	// ボタン1 クリック時の処理
	$("#btn1").click(function() {
		$("#lnk").attr("href", "index.html");
	});

	// ボタン2 クリック時の処理
	$("#btn2").click(function() {
		$("#lnk").removeAttr("href");
	});
});
