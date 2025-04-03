$(function() {
	// フォーカス
	$("#out, #text2").focus(function() {
		var id = $(this).attr("id");
		console.log("focus", id);
	});

	// ブラー
	$("#out, #text2").blur(function() {
		var id = $(this).attr("id");
		console.log("blur", id);
	});

	// フォーカス イン（子要素も対象）
	$("#out, #text2").focusin(function(e) {
		var id = $(this).attr("id");
		var idTrgt = $(e.target).attr("id");
		console.log("focusin", id, idTrgt);
	});

	// フォーカス アウト（子要素も対象）
	$("#out, #text2").focusout(function(e) {
		var id = $(this).attr("id");
		var idTrgt = $(e.target).attr("id");
		console.log("focusout", id, idTrgt);
	});
});
