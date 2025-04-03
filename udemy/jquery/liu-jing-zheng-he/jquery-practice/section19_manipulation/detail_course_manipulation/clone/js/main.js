$(function() {
	$("li").click(function() {
		console.log("クリック");
	});

	// btnClone クリック時の処理
	$("#btnClone").click(function() {
		var li = $("li").clone();
		$("ul").append(li);
	});
});
