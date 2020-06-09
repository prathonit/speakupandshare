<?php
    /* SETTING TIMEZONE */
    date_default_timezone_set('Asia/Kolkata');
    /* CLASSES */
    include_once $_SERVER['DOCUMENT_ROOT'].'/karan/lib/scripts/classes/database.class.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/karan/lib/scripts/classes/auth.class.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/karan/lib/scripts/classes/post.class.php';

    /* METHODS */
    include_once $_SERVER['DOCUMENT_ROOT'].'/karan/lib/scripts/methods/hash.method.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/karan/lib/scripts/methods/sanitize.method.php';
?>