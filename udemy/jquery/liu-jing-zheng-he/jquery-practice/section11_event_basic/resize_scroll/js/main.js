$(function() {
	// ウィンドウサイズ変更
	$(window).resize(function() {
		var w = $(window).width();
		var h = $(window).height();
		console.log(w, h);
	});

	// 行を増やす
	for (var i = 0; i < 5; i ++) {
		var p = $("p").clone();
		$("body").append(p);
	}

	// スクロールの処理
	$(window).scroll(function() {
		var top = $(window).scrollTop();
		console.log(top + "px");
	});
});
