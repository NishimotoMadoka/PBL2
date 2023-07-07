<!-- 変移先リンク -->
<?php
if (!isset($_SESSION)) {
  session_start();
}

$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

if (empty($name)) {
  if (isset($_COOKIE['name'])) {
    $name = $_COOKIE['name'];
    $user_id = $_COOKIE['user_id'];
  } else {
    $name = "no_login";
    $user_id = "no_login";
    setcookie("name", $name, time() + 60 * 60 * 24 * 14, '/');
    setcookie("user_id", $user_id, time() + 60 * 60 * 24 * 14, '/');
  }
  $_SESSION['name'] = $name;
  $_SESSION['user_id'] = $user_id;
}



$http_host = '//' . $_SERVER['SERVER_NAME'];
$id = "pbl2"; #フォルダ名に変更する

$toppage_php = $http_host . '/' . $id . '/top/toppage.php';
$login_php = $http_host . '/' . $id . '/login/login.php';
$logout_php = $http_host . '/' . $id . '/login/logout.php';
$signup_php = $http_host . '/' . $id . '/login/signup.php';
$mypage_php = $http_host . '/' . $id . '/user/mypage.php';
$post_php = $http_host . '/' . $id . '/article/post.php';
$diary_php = $http_host . '/' . $id . '/article/diary.php';
$update_db_php=$http_host . '/' . $id . '/user/update_db.php';
$update_php=$http_host . '/' . $id . '/user/update.php';
$friend_register_php=$http_host . '/' . $id . '/friend/friend_register.php';
$friend_list_php=$http_host . '/' . $id . '/friend/friend_list.php';
$user_php = $http_host . '/' . $id . '/classes/user.php';

$frame_css = $http_host . '/' . $id . '/css/frame.css';
$login_css = $http_host . '/' . $id . '/css/login.css';
$post_css = $http_host . '/' . $id . '/css/post.css';
$userpage_css = $http_host . '/' . $id . '/css/userpage.css';
$friend_register_css= $http_host . '/' . $id . '/css/friend_register.css';
$anime_css = $http_host . '/' . $id . '/css/anime.css';
$update_css = $http_host . '/' . $id . '/css/update.css';
$up_css = $http_host . '/' . $id . '/css/up.css';
$friendlist_css = $http_host . '/' . $id . '/css/friendlist.css';

$default_icon=$http_host . '/' . $id . '/icon_image/default.jpg';
$logo_img = $http_host . '/' . $id . '/img/logo2.png';






// $post_css = $http_host . '/' . $id . '/css/post.css';
