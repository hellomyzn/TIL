$(function() {
	// ボタン クリック時の処理
	$("#btn").click(function() {
		var $t = $("#text");

		// 値を取得
		console.log("plain", $t.width(), $t.height());
		console.log("inner", $t.innerWidth(), $t.innerHeight());
		console.log("outer1", $t.outerWidth(), $t.outerHeight());
		console.log("outer2", $t.outerWidth(true), $t.outerHeight(true));

		// 値を設定
		$t.width(300);

		// 値を設定（関数）
		$(".sub").width(function(i) {return i * 100 + 100});
	});
});
