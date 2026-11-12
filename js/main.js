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

menu();
