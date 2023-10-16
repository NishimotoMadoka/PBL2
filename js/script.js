let likeCount = 0;

// いいねボタンをクリックしたときの処理
document.getElementById("likeButton").addEventListener("click", function() {
 likeCount++; // いいねカウントを増やす
 document.getElementById("likeCount").innerText = likeCount; // カウントを表示
});
