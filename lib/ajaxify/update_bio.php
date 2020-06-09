<?php 
include_once '../config.php';
$user_email = sanitize_input($_REQUEST['user_email']);
$user_bio = sanitize_input($_REQUEST['user_bio']);
$auth = new Auth;
if ($auth->updateBio($user_email, $user_bio)) {
    session_start();
    $_SESSION['user_bio'] = $user_bio;
    echo 1;
} else {
    echo 0;
}
?>