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
		fnc("resolve")
		.done(  function(r) {console.log(r, "done1")})
		.fail(  function(r) {console.log(r, "fail1")})
		.always(function(r) {console.log(r, "always1")})
		.then(
			function(r) {console.log(r, "--done--"); return fnc("reject")},
		 	function(r) {console.log(r, "--fail--")}
		)
		.done(  function(r) {console.log(r, "done2")})
		.fail(  function(r) {console.log(r, "fail2")})
		.always(function(r) {console.log(r, "always2")})
		.then(
			function(r) {console.log(r, "--done--")},
		 	function(r) {console.log(r, "--fail--")}
		);
	});
});
