$(function() {
	// 1つ前の兄弟要素
	$("#btnPrev").click(function() {
		$(this).prev().text("Prevボタンで書き換え");
	});

	// 1つ後の兄弟要素
	$("#btnNext").click(function() {
		$(this).next().text("Nextボタンで書き換え");
	});
});
