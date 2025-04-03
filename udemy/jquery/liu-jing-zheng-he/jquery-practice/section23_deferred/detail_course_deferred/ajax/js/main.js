$(function() {
	var url = "http://api.flickr.com/services/feeds/"
			+ "photos_public.gne?jsoncallback=?"
	var data1 = {tags: "cat", tagmode: "any", format: "json"};
	var data2 = {tags: "dog", tagmode: "any", format: "json"};

	// btn クリック時の処理
	$("#btn").click(function() {
		$.when(
			$.getJSON(url, data1),
			$.getJSON(url, data2)
		)
		.done(function() {
			$.each(arguments, function(i, arg) {
				$.each(arg[0].items, function(i, itm) {
					$("<img>").attr("src", itm.media.m).appendTo("body");
				});
			});
		})
	});
});
