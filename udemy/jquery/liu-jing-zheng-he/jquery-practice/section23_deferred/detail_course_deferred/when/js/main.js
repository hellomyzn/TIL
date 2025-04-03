$(function() {
	// Deferred を利用した非同期の関数
	var fnc = function(msec) {
		var d = $.Deferred();

		setTimeout(function() {
			console.log("#resolve" + msec);
			d.resolve("wait" + msec);
		}, msec);

		console.log("#promise" + msec);
		return d.promise();
	};

	// btn1 クリック時の処理
	$("#btn1").click(function() {
		$.when(fnc(1000), fnc(2000), fnc(3000))
		.done(function(r1, r2, r3) {
			console.log(r1, r2, r3);
			console.log(arguments);
		})
	});

	// btn2 クリック時の処理
	$("#btn2").click(function() {
		var fncs = [fnc(1000), fnc(2000), fnc(3000)];
		$.when.apply($, fncs)
		.done(function() {
			console.log(arguments);
		})
	});
});
