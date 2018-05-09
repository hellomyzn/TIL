$(function() {
	// btnQ1 クリック時の処理
	$("#btnQ1").click(function() {
		$("div").slideUp().slideDown().slideUp();

		// キューの数
		console.log(
			$("div").queue().length,
			$("div").queue("fx").length
		);
	});

	// btnQ2 クリック時の処理
	$("#btnQ2").click(function() {
		$("div")
		.slideUp(function() {
			console.log("100", $(this).queue().length);
		})
		.queue(function() {
			console.log("200", $(this).queue().length);
			$(this).dequeue();
		})
		.slideDown()
		.queue(function(next) {
			console.log("300", $(this).queue().length);
			next();
		})
		.slideUp(function() {
			console.log("400", $(this).queue().length);
		})
		.queue(function() {
			console.log("500", $(this).queue().length);
		});
	});

	// btnClearQ クリック時の処理
	$("#btnClearQ").click(function() {
		$("div").clearQueue();
	});
});
