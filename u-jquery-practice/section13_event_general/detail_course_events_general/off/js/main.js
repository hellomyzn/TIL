$(function() {
	// 「実行」ボタンの処理
	$("#btnExec").click(function() {
		console.log("click click");
	});
	$("#btnExec").on("click", function() {
		console.log("on click");
	});
	$("#btnExec").on("click.myEvnt", function() {
		console.log("on click.myEvnt");
	});

	// 「イベント全削除」ボタンの処理
	$("#btnDelAll").click(function() {
		$("#btnExec").off("click");
	});

	// 「特定イベント削除」ボタンの処理
	$("#btnDelUnq").click(function() {
		$("#btnExec").off("click.myEvnt");
	});
});
