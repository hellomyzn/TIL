$(function() {
	// btn1 クリック時の処理
	$("#btn1").click(function() {
		$.get("message.txt", function(d) {
			console.log(d);
		});
	});

	// btn2 クリック時の処理
	$("#btn2").click(function() {
		$.get("message.txt")
		.done(function(d) {
			console.log(d);
		});
	});
});
