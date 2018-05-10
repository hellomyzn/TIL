$(function() {
	// btn1 クリック時の処理
	$("#btn1").click(function() {
		$("div").load("message.html");
	});

	// btn2 クリック時の処理
	$("#btn2").click(function() {
		$("div").load("message.html div:eq(2)");
	});
});
