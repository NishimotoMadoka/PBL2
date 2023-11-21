//URLから引数に入っている値を渡す処理（いるかな？？？）
function get_param(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return false;
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

$(document).on('click', '.favorite_btn', function (e) {
    e.stopPropagation();

    var $form = $(this).closest('form');
    // var article_id = $form.find('input[name="article_id"]').val();
    var user_id = $(this).data('user_id'); // ボタンの data-user-id 属性から user_id を取得
    var post_user_id = $(this).data('post_user_id'); // ボタンの data-post-user-id 属性から post_user_id を取得
    var article_id = $(this).data('article_id'); // ボタンの data-article-id 属性から article_id を取得
    // var good_time = $(this).data('good_time'); // ボタンの data-good-time 属性から good_time を取得

    console.log('Before AJAX - user_id:', user_id, 'post_user_id:', post_user_id, 'article_id:', article_id);

    // ajaxでlike.phpに処理を渡して非同期処理
    $.ajax({
        type: 'POST',
        url: 'http://localhost/pbl2/top/like.php',
        dataType: 'json',
        data: {
            user_id: user_id,
            post_user_id: post_user_id,
            article_id: article_id,
            // good_time: good_time
        }
    }).done(function (data) {
        console.log('AJAX Success - Response:', data);
        location.reload();
    }).fail(function () {
        console.log('AJAX Failed');
        location.reload();
    });
});