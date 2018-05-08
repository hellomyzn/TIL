$(function() {
	// btnFadeOut クリック時の処理
	$("#btnFadeOut").click(function() {
		$("div").fadeOut();
	});

	// btnFadeIn クリック時の処理
	$("#btnFadeIn").click(function() {
		$("div").fadeIn();
	});

	// btnFadeTo クリック時の処理
	$("#btnFadeTo").click(function() {
		$("div").fadeTo("slow", 0.5);
	});

	// btnFadeToggle クリック時の処理
	$("#btnFadeToggle").click(function() {
		$("div").fadeToggle();
	});
});
