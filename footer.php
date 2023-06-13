<!DOCTYPE html>
<html lang="ja">
    <body>
        <footer>
            <button id="btn">ページトップへ</button>
        </footer>

        <script>
            const btn = document.getElementById('btn');

            btn.addEventListener('click', () => {

                let scrollToOptions = {
                    top : 0,
                    behavior : 'smooth'
                };

                window.scrollTo(scrollToOptions);
            });
        </script>
    </body>
</html>
