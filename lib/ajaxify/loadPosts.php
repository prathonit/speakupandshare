<?php
include_once '../config.php';
session_start();
$offset = sanitize_input($_REQUEST['offset']);
$user_email = $_SESSION['user_email'];
$feed = sanitize_input($_REQUEST['feed']);
$user_posts = sanitize_input($_REQUEST['user_posts']);
$post = new Post;
echo $post->getPosts($user_email, $offset, $feed, $user_posts);
?>