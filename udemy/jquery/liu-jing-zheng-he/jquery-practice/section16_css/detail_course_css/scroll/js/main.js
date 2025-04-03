$(function() {
	var $win = $(window), id = null;
	$win.scroll(function() {
		if (id != null) clearTimeout(id);	// 100msec 以内のイベントはキャンセル
		id = setTimeout(function() {
			id = null;

			// 位置を出力
			console.log($win.scrollLeft(), $win.scrollTop());

			// 位置を戻す
			setTimeout(function() {
				$win.scrollLeft(0).scrollTop(0);
			}, 2000);
		}, 100);
	});
});
