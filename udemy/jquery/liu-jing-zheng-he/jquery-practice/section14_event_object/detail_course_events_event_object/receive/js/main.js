$(function() {
	// data と result の挙動
	$("#btn").click({dt: 1}, function(e) {
		console.log(this.id, e.data, e.result);
		return "send 1";
	});
	$("#btn").click({dt: 2}, function(e) {
		console.log(this.id, e.data, e.result);
		return "send 2";
	});

	$("#btnOut").on("click", {dt: 3}, function(e) {
		console.log(this.id, e.data, e.result);
	});
});
