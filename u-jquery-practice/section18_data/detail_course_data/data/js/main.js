$(function() {
	// ボタン クリック時の処理
	$("#btn").click(function() {
		var $t = $(this);

		console.log("name", $t.data("name"));
		console.log("age", $t.data("age"));
		console.log("like", $t.data("like"));

		$t.data("age", $t.data("age") + 1);
		if ($t.data("like")) $t.removeData("like");
		else                 $t.data("like", "cat");
		$t.removeData("name");
	});
});
