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
    var article_id = $(this).data('article_id'); // ボタンの data-user-id 属性から user_id を取得

    console.log('Before AJAX - user_id:', user_id, 'article_id:', article_id);

    // ajaxでlike.phpに処理を渡して非同期処理
    $.ajax({
        type: 'POST',
        url: './userpage_like.php',
        dataType: 'json',
        data: {
            user_id: user_id,
            article_id: article_id
        }
    }).done(function (data) {
        console.log('AJAX Success - Response:', data);
        location.reload();
    }).fail(function () {
        console.log('AJAX Failed');
        location.reload();
    });
});
