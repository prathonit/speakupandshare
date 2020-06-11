<?php 
include_once '../config.php';
session_start();
$user_email = sanitize_input($_SESSION['user_email']);
$post_id = sanitize_input($_REQUEST['post_id']);
$post = new Post;
echo $post->updateUpvote($user_email, $post_id);
?>