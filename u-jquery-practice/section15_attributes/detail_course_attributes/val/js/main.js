$(function() {
	// ボタン クリック時の処理
	$("#btn").click(function() {
		var text = $("#text1").val();
		console.log(text);
		$("#text2").val(text);
	});
});
