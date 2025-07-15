window.addEventListener('load', function () {
	//1画面の表示画像数
	const sp_image_count = 2;
	const pc_image_count = 5;
	const pc_sp_border = 743;
	var display_image_count = window.innerWidth < pc_sp_border ? sp_image_count : pc_image_count;

	// 用意された画像が1画面に表示する画像数未満のときに7以上に補完する
	const slider = document.querySelector('.client_slider');
	const images = slider.querySelectorAll('div>img');
	const imageCount = images.length;
	if (imageCount < display_image_count+1) {
		const clonesNeeded = display_image_count+1 - imageCount;
		for (let i = 0; i < clonesNeeded; i++) {
			const clone = images[i % imageCount].closest('div').cloneNode(true);
			slider.appendChild(clone);
		}
	}

	$(function () {
		$('.client_slider').slick({
			autoplay: true, // 自動でスクロール
			autoplaySpeed: 0, // 自動再生のスライド切り替えまでの時間を設定
			speed: 5000, // スライドが流れる速度を設定
			cssEase: "linear", // スライドの流れ方を等速に設定
			slidesToShow: display_image_count, // 表示するスライドの数
			swipe: false, // 操作による切り替えはさせない
			arrows: false, // 矢印非表示
			pauseOnFocus: false, // スライダーをフォーカスした時にスライドを停止させるか
			pauseOnHover: false, // スライダーにマウスホバーした時にスライドを停止させるか
			responsive: [
				{
					breakpoint: 743,
					settings: {
						slidesToShow: display_image_count, // 画面幅750px以下でスライド3枚表示
					}
				}
			]
		});
	});
})

