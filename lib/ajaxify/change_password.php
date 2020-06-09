<?php 
include_once '../config.php';
$user_email = sanitize_input($_REQUEST['user_email']);
$current_password = sanitize_input($_REQUEST['current_password']);
$new_password = sanitize_input($_REQUEST['new_password']);
$auth = new Auth;
if ($auth->changePassword($user_email, $current_password, $new_password)) {
    echo 1;
} else {
    echo 0;
}
?>