$(function() {
	// Deferred を利用した非同期の関数
	var fnc = function(type) {
		var d = $.Deferred();

		setTimeout(function() {
			console.log("#" + type);
			if (type == "resolve") d.resolve("o");
			if (type == "reject")  d.reject("x");
		}, 1000);

		console.log("#promise");
		return d.promise();
	};

	// btn クリック時の処理
	$("#btn").click(function() {
		// resolve 時に全ての done を処理
		// reject  時に全ての fail を処理
		// どちらでも、全ての always を処理
		fnc("reject")
		.done(  function(r) {console.log(r, "done1"); return "oo"})
		.fail(  function(r) {console.log(r, "fail1")})
		.always(function(r) {console.log(r, "always1")})
		.done(  function(r) {console.log(r, "done2")})
		.fail(  function(r) {console.log(r, "fail2")})
		.always(function(r) {console.log(r, "always2")});
	});
});
