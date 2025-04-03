$(function() {
	// text
	$("#btnText").click(function() {
		var text = $("#id1").text();
		$("#id2").text(text);
	});

	// html
	$("#btnHtml").click(function() {
		var html = $("#id1").html();
		$("#id2").html(html);
	});

	// attr
	$("#btnAttr").click(function() {
		var text = $("#id1").attr("id");
		$("#id2").text(text);
		$("#id2").attr("align", "right");
	});

	// css
	$("#btnCss").click(function() {
		var size = $("#id1 span").css("font-size");
		$("#id2").text(size).css("font-size", size);
		//$("#id2").text(size).css({"font-size": size});
		//$("#id2").text(size).css({fontSize: size});
	});
});
