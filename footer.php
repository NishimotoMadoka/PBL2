<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?= $frame_css ?>">
    </head>
    <body>
        <footer>
            <p id="topbtn"><a href="#"><span>page top</span></a></p>
        </footer>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
            //スクロールした際の動きを関数でまとめる
            function PageTopAnime() {
                var scroll = $(window).scrollTop();
                if (scroll >= 100){//上から100pxスクロールしたら
                  $('#topbtn').removeClass('DownMove');//#page-topについているDownMoveというクラス名を除く
                  $('#topbtn').addClass('UpMove');//#page-topについているUpMoveというクラス名を付与
                }else{
                  if($('#topbtn').hasClass('UpMove')){//すでに#page-topにUpMoveというクラス名がついていたら
                    $('#topbtn').removeClass('UpMove');//UpMoveというクラス名を除き
                    $('#topbtn').addClass('DownMove');//DownMoveというクラス名を#page-topに付与
                  }
                }
              }
  
            // 画面をスクロールをしたら動かしたい場合の記述
            $(window).scroll(function () {
                PageTopAnime();/* スクロールした際の動きの関数を呼ぶ*/
            });
  
            // ページが読み込まれたらすぐに動かしたい場合の記述
            $(window).on('load', function () {
            PageTopAnime();/* スクロールした際の動きの関数を呼ぶ*/
            });
  
  
            // #page-topをクリックした際の設定
            $('#topbtn').click(function () {
                var scroll = $(window).scrollTop(); //スクロール値を取得
                if(scroll > 0){
                $(this).addClass('floatAnime');//クリックしたらfloatAnimeというクラス名が付与
                    $('body,html').animate({
                        scrollTop: 0
                    }, 2000,function(){//スクロールの速さ。数字が大きくなるほど遅くなる
                        $('#topbtn').removeClass('floatAnime');//上までスクロールしたらfloatAnimeというクラス名を除く
                    }); 
                }
                return false;//リンク自体の無効化
            });
  
        </script>
    </body>
</html>
