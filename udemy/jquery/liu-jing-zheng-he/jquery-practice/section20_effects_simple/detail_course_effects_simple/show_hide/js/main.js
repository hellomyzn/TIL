$(function() {
	// btnHide クリック時の処理
	$("#btnHide").click(function() {
		$("div").hide();
	});

	// btnShow クリック時の処理
	$("#btnShow").click(function() {
		$("div").show();
	});

	// btnToggle クリック時の処理
	$("#btnToggle").click(function() {
		$("div").toggle();
	});
});
