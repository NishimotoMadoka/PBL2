<?php
    require_once __DIR__ .'/pre.php';
?><!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?= $frame_css ?>">
    </head>
    <body>
        <footer id="footer">
            <p id="page-top"><a href="#"><span>Page Top</span></a></p>
        </footer>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script>
            function PageTopAnime() {
                var scroll = $(window).scrollTop();
                if (scroll >= 100) {
                    $("#page-top").removeClass("DownMove"); //#page-topについているDownMoveというクラス名を除く
                    $("#page-top").addClass("UpMove"); //#page-topについているUpMoveというクラス名を付与
                } else {
                if ($("#page-top").hasClass("UpMove")) {
                        $("#page-top").removeClass("UpMove"); //UpMoveというクラス名を除き
                        $("#page-top").addClass("DownMove"); //DownMoveというクラス名を#page-topに付与
                    }
                }
            }

            $(window).scroll(function () {
                PageTopAnime();
            });

            $(window).on("load", function () {
                PageTopAnime(); 
            });

            $("#page-top").click(function () {
                var scroll = $(window).scrollTop(); //スクロール値を取得
                if (scroll > 0) {
                    $(this).addClass("floatAnime"); //クリックしたらfloatAnimeというクラス名が付与
                    $("body,html").animate(
                        {
                            scrollTop: 0
                        },
                        2000,
                        function () {
                            $("#page-top").removeClass("floatAnime"); //上までスクロールしたらfloatAnimeというクラス名を除く
                        }
                    );
                }
                return false; //リンク自体の無効化
            });
        </script>
    </body>
</html>
