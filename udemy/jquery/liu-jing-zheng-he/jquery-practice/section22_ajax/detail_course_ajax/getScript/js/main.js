$(function() {
	// btn クリック時の処理
	$("#btn").click(function() {
		$.getScript("message.js")
		.done(function(d) {
			console.log(d);
		});
	});
});
