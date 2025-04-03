$(function() {
	var demo = 0;

	var o1 = {name: "Mike", age: 18};
	var o2 = {height: 175, weight: 65};
	var o3 = {like: ["cat", "dog"]};

	// o1にo2をマージ
	if (demo == 0) {
		$.extend(o1, o2);
		console.log("o1", o1);
		console.log("o2", o2);
	}

	// o1とo2をマージした新オブジェクトを作成
	if (demo == 1) {
		var oNew = $.extend({}, o1, o2);
		console.log("oNew", oNew);
		console.log("o1", o1);
		console.log("o2", o2);
	}

	// シャローコピー
	if (demo == 2) {
		var oNew = $.extend({}, o1, o3);
		o3.like[0] = "monkey";
		console.log("oNew", oNew);
		console.log("oNew.like", oNew.like);
		console.log("o3.like", o3.like);
	}

	// ディープコピー
	if (demo == 3) {
		var oNew = $.extend(true, {}, o1, o3);
		o3.like[0] = "monkey";
		console.log("oNew", oNew);
		console.log("oNew.like", oNew.like);
		console.log("o3.like", o3.like);
	}

	// 関数の引数のデフォルト値
	if (demo == 4) {
		var fnc = function(prms) {
			prms = $.extend(true, {name: "Mike", age: 18}, prms);
			console.log(prms);
		};
		fnc();
		fnc({name: "Bob"});
	}
});
