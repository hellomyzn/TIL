$(function() {
	// btnAnm クリック時の処理
	$("#btnAnm").click(function() {
		$("div")
		.animate({left: "100px"}, 2000)
		.animate({top:  "100px"}, 500)
		.animate({left: 0}, 500)
		.animate({top:  0}, 500, function() {
			console.log("end");
		});
	});

	// btnFinish クリック時の処理
	$("#btnFinish").click(function() {
		$("div").finish();
	});

	// btnStop1 クリック時の処理
	$("#btnStop1").click(function() {
		$("div").stop();
	});

	// btnStop2 クリック時の処理
	$("#btnStop2").click(function() {
		$("div").stop(true, true);
	});
});
