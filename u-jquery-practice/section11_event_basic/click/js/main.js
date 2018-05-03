$(function() {
	// h1のクリックに処理を設定
	$("h1").click(function() {
		console.log("h1 クリック");
	});

	// pのクリック用の処理
	var pClick = function() {
		console.log("p クリック");
	};
	var pWClick = function() {
		console.log("p ダブルクリック");
	};

	// pのクリック、ダブルクリックに処理を設定
	$("p").click(pClick);
	$("p").dblclick(pWClick);
});
