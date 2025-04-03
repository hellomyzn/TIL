$(function() {
	$("#lnkOut").click(function(e) {
		console.log(this.id);
	});

	$("a").click(function(e) {
		console.log(this.id, 1);

		// 通常実行される処理を阻止
		// e.preventDefault();
		//
		// バブリングを阻止
		// e.stopPropagation();
		//
		// バブリングを阻止＆
		// 以降のイベントハンドラーを阻止
		// e.stopImmediatePropagation();
	});
	$("a").click(function(e) {
		console.log(this.id, 2);
	});
});
