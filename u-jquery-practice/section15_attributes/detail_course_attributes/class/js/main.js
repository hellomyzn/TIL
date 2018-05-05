$(function() {
	// btnAdd クリック時の処理
	$("#btnAdd").click(function() {
		$("p").addClass("attention");
	});

	// btnRmv クリック時の処理
	$("#btnRmv").click(function() {
		$("p").removeClass("attention");
	});

	// btnTgl クリック時の処理
	$("#btnTgl").click(function() {
		$("p").toggleClass("attention");
	});

	// btnHas クリック時の処理
	$("#btnHas").click(function() {
		console.log($("p").hasClass("attention"));
	});
});
