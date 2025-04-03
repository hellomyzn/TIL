$(function() {
	// ajax
	$("#btnAjax").click(function() {
		$.ajax({
			url: "./text1.txt",
			success: function(data) {
				$("#target").text(data);
			}
		});
	});
});
