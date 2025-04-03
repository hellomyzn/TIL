$(function() {
	// hide
	$("#btnHide").click(function() {
		$("#target").hide();
	});

	// show
	$("#btnShow").click(function() {
		$("#target").show();
	});

	// toggle
	$("#btnToggle").click(function() {
		$("#target").toggle();
	});

	// toggle2
	$("#btnToggle2").click(function() {
		// $("#target").toggle("slow");
		$("#target").toggle(2000);
	});
});
