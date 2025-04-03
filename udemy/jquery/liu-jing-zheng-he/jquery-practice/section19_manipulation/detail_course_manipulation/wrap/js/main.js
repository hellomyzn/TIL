$(function() {
	// btnWrap クリック時の処理（要素を包む）
	$("#btnWrap").click(function() {
		$(".brdrR").wrap('<div class="brdrG"></div>');
	});

	// btnUnwrap クリック時の処理（親を削除）
	$("#btnUnwrap").click(function() {
		$(".brdrR").unwrap();
	});

	// btnWrapInner クリック時の処理（要素の内側を包む）
	$("#btnWrapInner").click(function() {
		$(".brdrR").wrapInner('<div class="brdrG"></div>');
	});

	// btnWrapAll クリック時の処理（要素をまとめて包む）
	$("#btnWrapAll").click(function() {
		$(".brdrR").wrapAll('<div class="brdrG"></div>');
	});
});
