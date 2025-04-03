$(function() {
	// btnAfter クリック時の処理
	$("#btnAfter").click(function() {
		var li = $("<li>").text("後に追加");
		$("#trgt").after(li);
	});

	// btnBefore クリック時の処理
	$("#btnBefore").click(function() {
		var li = $("<li>").text("前に追加");
		$("#trgt").before(li);
	});

	// btnInsAfter クリック時の処理
	$("#btnInsAfter").click(function() {
		$("<li>").text("後に追加").insertAfter("#trgt");
	});

	// btnInsBefore クリック時の処理
	$("#btnInsBefore").click(function() {
		$("<li>").text("前に追加").insertBefore("#trgt");
	});
});
