$(function() {
	// ボタンの処理
	$("#btn").click(function(e) {
		// イベントの種類
		console.log("type", e.type);

		// ページ内のマウスのX,y座標
		console.log("pageX", e.pageX);
		console.log("pageY", e.pageY);

		// ボタンに紐付けられたキーコード
		console.log("which", e.which);
	});
});
