const mySwiper = new Swiper('.swiper', {
  navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
  },
  pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
  },
  loop: true,

  slidesPerView: 1,
  spaceBetween: 10,
  breakpoints: {
    // スライドの表示枚数：500px以上の場合
    750: {
      slidesPerView: 3,
      spaceBetween: 10
    },
    550: {
      slidesPerView: 2,
      spaceBetween: 10
    }
  }


  // スライドの間隔

});

$(function(){
  $('.js-typing-moment01').t({
    speed:70,//60ミリ秒
    speed_vary:false,//人間のようなタイピング動作にする
    blink_perm:false,//常に点滅しない(終了時のみ)
    blink:false,
    caret: false,
    fin:function(elm){
      $('.js-typing-moment02').t({
        speed:100,//60ミリ秒
        speed_vary:false,//人間のようなタイピング動作にする
        blink_perm:false,//常に点滅しない(終了時のみ)
      });
    }
  });
});
