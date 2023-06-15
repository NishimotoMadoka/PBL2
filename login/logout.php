<?php
require_once __DIR__ . '/../header.php';

$_SESSION = [];
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 1000, '/');
}
session_destroy();

setcookie('name', '', time() -  60 * 60 * 24 * 14, '/');
setcookie('user_id', '', time() -  60 * 60 * 24 * 14, '/');

header("Location:" . $login_php);
