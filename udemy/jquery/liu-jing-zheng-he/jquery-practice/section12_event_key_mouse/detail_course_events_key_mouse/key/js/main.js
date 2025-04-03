$(function() {
	var demo = 2;

	if (demo == 0) {
		// キー ダウン
		$("#text").keydown(function(e) {
			var c = String.fromCharCode(e.which)
			console.log("keydown", e.which, c);
		});

		// キー プレス
		$("#text").keypress(function(e) {
			var c = String.fromCharCode(e.which)
			console.log("keypress", e.which, c);
		});

		// キー アップ
		$("#text").keyup(function(e) {
			var c = String.fromCharCode(e.which)
			console.log("keyup", e.which, c);
		});
	}

	if (demo == 1) {
		// キー アップ
		$("#text").keyup(function(e) {
			var c = String.fromCharCode(e.which)
			console.log(
				"alt:"   + (e.altKey   ? "o" : "x"),
				"ctrl:"  + (e.ctrlKey  ? "o" : "x"),
				"shift:" + (e.shiftKey ? "o" : "x"),
				c);
		});
	}

	if (demo == 2) {
		// キー アップ
		var tOld = "";
		$("#text").keyup(function(e) {
			var tNow = $(this).val();
			if (tOld != tNow) {
				console.log(tNow);
				tOld = tNow;
			}
		});
	}
});
