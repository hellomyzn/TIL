$(function() {
	// クリック時の処理
	$("*").click(function() {
		var tag = this.tagName;
		var id = this.id;
		console.log("click", tag, id);
	});
});
