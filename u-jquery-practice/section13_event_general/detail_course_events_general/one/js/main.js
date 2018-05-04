$(function() {
	// ボタンの処理
	$(":button").one("click", function() {
		var text = $(this).text();
		console.log("click", text);
	});
});
