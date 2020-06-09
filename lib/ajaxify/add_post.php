<?php 
include_once '../config.php';
$post_user_email = sanitize_input($_REQUEST['user_email']);
$post_text = sanitize_input($_REQUEST['post_text']);
$post = new Post;
if ($post->addPost($post_user_email, $post_text, 0)) {
    echo 1;
} else {
    echo 0;
}
?>