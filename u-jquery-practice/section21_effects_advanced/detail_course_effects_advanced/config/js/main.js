$(function() {
	// btn1 クリック時の処理
	$("#btn1").click(function() {
		console.log($.fx.interval);

		$.fx.interval = 500;
		$("div").slideUp(2000).slideDown(2000);
	});

	// btn2 クリック時の処理
	$("#btn2").click(function() {
		console.log($.fx.off);

		$.fx.off = true;
		$("div").slideUp(2000).slideDown(2000);
	});
});
