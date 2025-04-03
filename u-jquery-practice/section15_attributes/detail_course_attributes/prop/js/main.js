$(function() {
	// btnAttr クリック時の処理
	$("#btnAttr").click(function() {
		console.log("cb1", $("#cb1").attr("checked"));
		console.log("cb2", $("#cb2").attr("checked"));
	});

	// btnProp クリック時の処理
	$("#btnProp").click(function() {
		console.log("cb1", $("#cb1").prop("checked"));
		console.log("cb2", $("#cb2").prop("checked"));
	});

	// btnSet クリック時の処理
	$("#btnSet").click(function() {
		$("#cb1").prop("checked", false);
		$("#cb2").prop("checked", true);
	});

	// btnRmv クリック時の処理
	$("#btnRmv").click(function() {
		$(this).prop("myProp", true);
		console.log($(this).prop("myProp"));

		$(this).removeProp("myProp");
		console.log($(this).prop("myProp"));
	});
});
