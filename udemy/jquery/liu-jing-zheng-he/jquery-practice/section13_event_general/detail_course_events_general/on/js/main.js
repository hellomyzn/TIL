$(function() {
	// 「追加」ボタンの処理
	$("#btn").click(function() {
		var li = $("li").clone();
		$("ul").append(li);
	});

	// liのクリックに処理を設定
	$("li").click(function() {
		console.log("click", this);
	});
	$("li").on("click", function() {
		console.log("on1", this);
	});

	// liのクリックに処理を設定
	$("ul").on("click", "li", function() {
		console.log("on2", this);
	});

	$("body").on("click", "li", function() {
		console.log("on3", this);
	});
});
