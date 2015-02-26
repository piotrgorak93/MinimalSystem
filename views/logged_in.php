<?php
include_once 'header.html';
$_SESSION['logged_in'] = true; //set you've logged in
$_SESSION['last_activity'] = time(); //your last activity was now, having logged in.
$_SESSION['expire_time'] = 1*60*5; //expire time in seconds: three hours (you must change this)
if ($_SESSION['last_activity'] < time() - $_SESSION['expire_time']) { //have we expired?
    //logout
    $ob = new Login("logout");
    exit();


} else{ //if we haven't expired:
    $_SESSION['last_activity'] = time(); //this was the moment of last activity.
}
if ($_SESSION[user_name]==="Administrator")
    include_once 'content_admin.php';
else
include_once 'content.php';
include_once 'footer.html';
?>