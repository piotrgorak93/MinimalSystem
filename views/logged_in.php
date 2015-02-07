<?php
include_once 'header.html';
if ($_SESSION[user_name]==="Administrator")
    include_once 'content_admin.php';
else
include_once 'content.php';
include_once 'footer.html';
?>