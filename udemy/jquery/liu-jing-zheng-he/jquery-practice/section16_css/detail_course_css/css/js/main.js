$(function() {
	// ボタン クリック時の処理
	$("#btn").click(function() {
		var $text = $("#text");

		// 値を取得
		console.log($text.css("color"));
		console.log($text.css(["color", "font-weight"]));

		// 値を設定
		$text.css("background", "blue");
		$text.css({
			width: "300px",
			height: "100px",
			fontSize: "200%",
			"font-style": "italic"
		});

		// 値を設定（関数）
		$(".sub").css("font-size", function(i) {
			return (i + 2) + "em";
		});
	});
});
