$(function() {
	// append
	$("#btnAppend").click(function() {
		var $div = $("<div>").text("A");
		$("#target").append($div);
	});


	// prepend
	$("#btnPrepend").click(function() {
		var $div = $("<div>").text("B");
		$("#target").prepend($div);
	});

	// appendTo
	$("#btnAppendTo").click(function() {
		$("<div>").text("C").appendTo("#target");
	});




	// prependTo
	$("#btnPrependTo").click(function() {
		$("<div>").text("D").prependTo("#target");
	});
});
