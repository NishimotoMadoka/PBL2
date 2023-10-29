$('.like-button').click(function() {
    const button = $(this);
    const articleId = button.data('articleid');
    const liked = button.hasClass('liked');
    $.ajax({
        url: 'like.php', // サーバースクリプトのURL
        method: 'POST',
        data: { articleId: articleId, liked: liked },
        success: function(response) {
            const data = JSON.parse(response);
            if (data.success) {
                const likeCount = data.likeCount;
                // いいね数を更新
                button.closest('.article').find('.like-count').text(likeCount);
            }
        }
    });
});
