$(function() {
	var demo = 2;

	if (demo == 0) {
		// マウス ダウン
		$("#out, #text2").mousedown(function(e) {
			console.log("mousedown", e.which);
			//console.log(e);
		});

		// マウス アップ
		$("#out, #text2").mouseup(function(e) {
			console.log("mouseup", e.which, e.target.id);
		});
	}

	if (demo == 1) {
		// 対象要素のみ
		$("#out, #text2")
		.mouseenter(function(e) {	// 対象要素のみ
			console.log(e.target.id, "mouseenter");
		})
		.mouseleave(function(e) {	// 対象要素のみ
			console.log(e.target.id, "mouseleave");
		})
		.mouseover(function(e) {	// 子要素も対象
			console.log(e.target.id, "mouseover");
		})
		.mouseout(function(e) {		// 子要素も対象
			console.log(e.target.id, "mouseout");
		});
	}

	if (demo == 2) {
		// マウス ムーブ
		$("#out, #text2").mousemove(function(e) {
			var x = e.pageX;
			var y = e.pageY;
			console.log("mousemove", x, y);
		});
	}
});
