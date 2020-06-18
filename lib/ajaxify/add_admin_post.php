<?php 
include_once '../config.php';
session_start();
$user_email = sanitize_input($_SESSION['user_email']);
if ($user_email != ADMIN) {
    die('UNAUTHORIZED');
}
$admin_post_c = sanitize_input($_REQUEST['admin_post_c']);
$admin_post_text = sanitize_input($_REQUEST['admin_post_text']);
$post = new Post;
echo $post->addPost($user_email, $_SESSION['user_name'], $_SESSION['user_pic'], $admin_post_text, $admin_post_c);
?>