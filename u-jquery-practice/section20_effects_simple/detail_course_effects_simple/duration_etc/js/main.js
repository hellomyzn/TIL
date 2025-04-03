$(function() {
	// btnDuration クリック時の処理
	$("#btnDuration").click(function() {
		$("div").hide("");	// (default) 400msec
		//$("div").hide("fast");	// "fast" 200msec
		//$("div").hide("slow");	// "slow" 600msec
		//$("div").hide(1000);	// msec指定
	});

	// btnEasing クリック時の処理
	$("#btnEasing").click(function() {
		$("div").hide(2000, "easeInElastic");
	});

	// btnCallback クリック時の処理
	$("#btnCallback").click(function() {
		$("div").hide(1000, function() {
			console.log("end");
		});
	});
});
