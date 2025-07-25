window.onload = function () {
	//各見出しに連番のクラス名を追加
	// $(function(){
	// 	var h2_count = 0;
	// 	var h3_count = 0;
	// 	var h4_count = 0;
	// 	$('h2').each(function(){
	// 		$('h2').eq(h2_count).attr('id','h2-'+h2_count);
	// 		h2_count++
	// 	});
	// 	$('h3').each(function(){
	// 		$('h3').eq(h3_count).attr('id','h3-'+h3_count);
	// 		h3_count++
	// 	});
	// 	$('h4').each(function(){
	// 		$('h4').eq(h4_count).attr('id','h4-'+h4_count);
	// 		h4_count++
	// 	});
	// });

	// モーダル表示ボタンを表示
	$('.modal_index_toggle').css('display', 'flex');

	// モーダル目次表示、非表示
	const modalToggle = document.querySelector('.modal_index_toggle');
	const modalWrap = document.querySelector('.modal_index_wrap');
	const modalIndex = document.querySelector('.modal_index'); // modal_index要素を取得

	if (modalToggle && modalWrap) {
		modalToggle.addEventListener('click', function (event) {
			event.preventDefault(); // デフォルトの動作をキャンセル
			modalWrap.classList.toggle('is-active'); // is-active クラスを切り替え
		});
	}

	modalWrap.addEventListener('click', function (event) {
		if (event.target === modalWrap) { // クリックされた要素が modalWrap 自身であるか (つまりモーダルの外側)
			modalWrap.classList.remove('is-active'); // is-active クラスを削除してモーダルを閉じる
		}
	});
	if (modalIndex) {
		const modalLinks = modalIndex.querySelectorAll('a'); // modal_index内のすべてのa要素を取得
		modalLinks.forEach(function (link) {
			link.addEventListener('click', function (event) {
				modalWrap.classList.remove('is-active'); // モーダルを閉じる
			});
		});
	}
	$('.table-of-contents-toggle').fadeIn();
	$('.table-of-contents-toggle').click(function () {
		$('.page_index_level_1').toggle();
		var toggleButton = $(this);
		if (toggleButton.text() === 'CLOSE') {
			toggleButton.text('OPEN');
		} else {
			toggleButton.text('CLOSE');
		}
	});


}