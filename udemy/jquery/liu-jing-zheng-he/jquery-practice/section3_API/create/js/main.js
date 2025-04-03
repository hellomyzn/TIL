$(function() {
	var a1 = $('<a href="https://jquery.com/">');
	console.log("a1[0] : ", a1[0]);

	var a2 = $("<a>").attr("name", "jquery");
	console.log("a2[0] : ", a2[0]);

	var a3 = $('<a href="https://jquery.com/">0</a>'
		+ '<a href="https://jquery.com/">1</a>');
	console.log("a3[0] : ", a3[0]);
	console.log("a3[1] : ", a3[1]);
});
