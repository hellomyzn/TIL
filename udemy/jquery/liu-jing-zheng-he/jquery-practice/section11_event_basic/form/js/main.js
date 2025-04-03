$(function() {
	// ラジオボタンの値変更
	$(":radio").change(function() {
		var name = $(this).attr("name");
		var val = $(this).val();
		console.log(name, val);
	});

	// チェックボックスの値変更
	$(":checkbox").change(function() {
		var name = $(this).attr("name");
		var isChecked = $(this).prop("checked");
		console.log(name, isChecked);
	});

	// 入力欄の値変更
	$(":text").change(function() {
		var name = $(this).attr("name");
		var val = $(this).val();
		console.log(name, val);
	});

	// submitの処理
	$("#f").submit(function() {
		console.log(this);

		// フォームデータのシリアライズ
		console.log($(this).serialize());
		console.log($(this).serializeArray());

		// イベントを停止
		return false;
	});
});
