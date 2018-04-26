$(function() {
	// ajax
	$("#btnAjax").click(function() {
		// text1.txt を読み込み
		$.ajax({url: "./text1.txt", success: function(data) {
			$("<div>").text(data).appendTo("#target");

			// 500msec 待つ
			setTimeout(function() {
				// text2.txt を読み込み
				$.ajax({url: "./text2.txt", success: function(data) {
					$("<div>").text(data).appendTo("#target");

					// 500msec 待つ
					setTimeout(function() {
						// text3.txt を読み込み
						$.ajax({url: "./text3.txt", success: function(data) {
							$("<div>").text(data).appendTo("#target");
						}});
					}, 500);
				}});
			}, 500);
		}});
	});
});
