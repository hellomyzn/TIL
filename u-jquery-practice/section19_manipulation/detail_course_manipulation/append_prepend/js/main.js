$(function() {
	// btnAppend クリック時の処理
	$("#btnAppend").click(function() {
		var li = $("<li>").text("末尾に追加");
		$("ul").append(li);
	});

	// btnPrepend クリック時の処理
	$("#btnPrepend").click(function() {
		var li = $("<li>").text("先頭に追加");
		$("ul").prepend(li);
	});

	// btnAppendTo クリック時の処理
	$("#btnAppendTo").click(function() {
		$("<li>").text("末尾に追加").appendTo("ul");
	});

	// btnPrependTo クリック時の処理
	$("#btnPrependTo").click(function() {
		$("<li>").text("先頭に追加").prependTo("ul");
	});

	// btnFnc クリック時の処理
	$("#btnFnc").click(function() {
		$("li").prepend(function(i) {
			return "<b>" + i + "</b> ";
		});
	});
});
