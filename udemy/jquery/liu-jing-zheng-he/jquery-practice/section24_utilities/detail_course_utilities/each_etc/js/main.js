$(function() {
	var demo = 2;

	var arr = [1, 2, 3, 5, 7, 11, 13, 17, 19, 23];
	var obj = {name: "Mike", age: 18};

	// $.each()
	if (demo == 0) {
		$.each(arr, function(i, x) {
			console.log("[" + i + "]", x);
		});
	}

	// $.map()
	if (demo == 1) {
		var arr2 = $.map(arr, function(x, i) {
			return x - 1;
		});
		console.log(arr2);

		var arr3 = $.map(obj, function(val, key) {
			return key + "@" + val;
		});
		console.log(arr3);
	}

	// $.grep()
	if (demo == 2) {
		var arr2 = $.grep(arr, function(x, i) {
			return x % 10 == 1;
		});
		console.log(arr2);
	}
});
