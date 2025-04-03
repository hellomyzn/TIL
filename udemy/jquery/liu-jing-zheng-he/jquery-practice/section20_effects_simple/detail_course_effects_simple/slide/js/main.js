$(function() {
	// btnSlideUp クリック時の処理
	$("#btnSlideUp").click(function() {
		$("div").slideUp();
	});

	// btnSlideDown クリック時の処理
	$("#btnSlideDown").click(function() {
		$("div").slideDown();
	});

	// btnSlideToggle クリック時の処理
	$("#btnSlideToggle").click(function() {
		$("div").slideToggle();
	});
});
