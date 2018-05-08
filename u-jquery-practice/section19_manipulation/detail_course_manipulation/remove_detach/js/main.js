$(function() {
	$("li:eq(0)").click(function() {
		console.log("クリック");
	});

	// btnRemove クリック時の処理
	$("#btnRemove").click(function() {
		$("li:eq(0)").remove().appendTo("ul:eq(1)");
	});

	// btnDetach クリック時の処理
	// （イベントなどのjQueryの情報は保持）
	$("#btnDetach").click(function() {
		$("li:eq(0)").detach().appendTo("ul:eq(1)");
	});
});
