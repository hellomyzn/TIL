$(function() {
	// ホバー
	$("#text").hover(function() {
		$(this).css("background", "#fdd").val("ホバー");
	}, function() {
		$(this).css("background", "").val("");
	});
});
