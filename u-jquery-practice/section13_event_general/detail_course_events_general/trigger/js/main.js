$(function() {
	// divの処理
	$("#btnOut").click(function() {
		console.log("click", this.id);
	});

	// ボタンの処理
	$("#btn1").click(function() {
		console.log("click", this.id);
	});

	// 「trigger」ボタンの処理
	$("#btnTrgr").click(function() {
		$("#btn1").trigger("click");
	});

	// 「triggerHandler」ボタンの処理
	// ・登録したイベントのみ実行
	// ・選択した要素の最初のみ
	// ・イベントがDOMツリーに遡ることはない
	$("#btnTrgrHndlr").click(function() {
		$("#btn1").triggerHandler("click");
	});
});
