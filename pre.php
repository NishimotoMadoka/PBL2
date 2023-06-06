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
    $name = 'no_login';
    $user_id = 'no_login';
    setcookie("name", $name, time() + 60 * 60 * 24 * 14, '/');
    setcookie("user_id", $user_id, time() + 60 * 60 * 24 * 14, '/');
  }
  $_SESSION['name'] = $name;
  $_SESSION['user_id'] = $user_id;
}



$http_host = '//' . $_SERVER['SERVER_NAME'];
$id = "pbl2"; #フォルダ名に変更する

$home_php = $http_host . '/' . $id . '/home/home.php';
$logout_php = $http_host . '/' . $id . '/login/logout.php';
$signup_php = $http_host . '/' . $id . '/login/signup.php';
$mypage_php = $http_host . '/' . $id . '/user/mypage.php';

