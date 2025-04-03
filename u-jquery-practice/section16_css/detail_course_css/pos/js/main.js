$(function() {
	// ボタン1 クリック時の処理
	$("#btn1").click(function() {
		console.log("p1", $("#p1").offset());
		console.log("p2", $("#p2").offset());

		console.log("p1", $("#p1").position());
		console.log("p2", $("#p2").position());
	});

	// ボタン2 クリック時の処理
	$("#btn2").click(function() {
		$("#p1").offset({top: 20, left: 20});
		$("#p2").offset(function(i, coords) {
			return {top: coords.top + 10,
					left: coords.left + 10};
		});
	});
});
