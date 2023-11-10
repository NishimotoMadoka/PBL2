<?php
define('MAX', '20');
// $count = count($article_count);
$count = $article_count;
$max_page = ceil($count / MAX);

if (!isset($_GET['a_page_id'])) {
  $page = 1;
} else {
  $page = $_GET['a_page_id'];
}

$start_no = ($page - 1) * MAX;

// $article_data = array_slice($article_count, $start_no, MAX, true);

if ($page == 1 || $page == $max_page) {
  $range = 4;
} elseif ($page == 2 || $page == $max_page - 1) {
  $range = 3;
} else {
  $range = 2;
}

$from_record = ($page - 1) * 20 + 1;

if ($page == $max_page && $count % 20 !== 0) {
  $to_record = ($page - 1) * 20 + $count % 20;
} else {
  $to_record = $page * 20;
}
