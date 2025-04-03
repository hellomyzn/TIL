$(function() {
	var demo = 2;

	if (demo == 0) {
		$("#btnOut").click(function(e) {
			// イベント発生源の要素
			console.log("target", e.target);

			// 現在のイベントで対象になっている要素（this）
			console.log("currentTarget", e.currentTarget);
		});
	}

	if (demo == 1) {
		$("body").on("click", "#btnOut", function(e) {
			// イベント発生源の要素
			console.log("target", e.target);

			// 現在のイベントで対象になっている要素（this）
			console.log("currentTarget", e.currentTarget);

			// イベントハンドラーが指定されていた要素
			console.log("delegateTarget", e.delegateTarget);
		});
	}

	if (demo == 2) {
		$("#btn").mouseout(function(e) {
			// 関係する要素
			// （マウスが外れた後、マウスが入った要素）
			console.log("relatedTarget", e.relatedTarget);
		});
	}
});
