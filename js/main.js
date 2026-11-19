const menu = () => {

  //ハンバーガーメニュー、使用HTML要素取得
  //ハンバーガーボタン
  const btn = document.querySelector('.menu-toggle');
  //ナビメニュー
  const nav = document.querySelector('.gnav');

  //メニューの開閉
  const toggle = (open) => {
    btn.classList.toggle('is-open', open);
    nav.classList.toggle('is-open', open);
    //開いている間は背景をスクロールさせない
    document.body.classList.toggle('is-scroll-locked', open);
    btn.setAttribute('aria-expanded', open);
    btn.setAttribute('aria-label', open ? 'メニューを閉じる' : 'メニューを開く');
  };

  //ハンバーガーボタンクリック処理
  btn.addEventListener('click', () => {
    toggle(!nav.classList.contains('is-open'));
  });

  //メニュー内リンクのクリックで閉じる
  nav.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => toggle(false));
  });
};

const reveal = () => {

  //スクロールで出てくる要素
  const targets = document.querySelectorAll('.js-reveal');
  if (!targets.length) return;

  //古いブラウザなどで使えないときは、全部すぐ表示する
  if (!('IntersectionObserver' in window)) {
    targets.forEach((target) => target.classList.add('is-inview'));
    return;
  }

  //画面の下から15%くらい入ったら表示する（一度出たら、もう見張らない）
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-inview');
        observer.unobserve(entry.target);
      }
    });
  }, { rootMargin: '0px 0px -15% 0px' });

  targets.forEach((target) => observer.observe(target));
};

menu();
reveal();
