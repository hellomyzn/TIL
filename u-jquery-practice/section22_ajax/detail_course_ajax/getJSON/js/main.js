$(function() {
	var url = "http://api.flickr.com/services/feeds/"
			+ "photos_public.gne?jsoncallback=?";
	var data = {tags: "cc0", tagmode: "any", format: "json"};

	// btn クリック時の処理
	$("#btn").click(function() {
		$.getJSON(url, data)
		.done(function(d) {
			console.log(d);
			$.each(d.items, function(i, itm) {
				$("<img>").attr("src", itm.media.m).appendTo("body");
			});
		});
	});
});
