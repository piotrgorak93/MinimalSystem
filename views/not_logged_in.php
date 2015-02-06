<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}

include_once 'header.html';
if (isset($_GET["logout"])) {
    include_once 'popup.html';
}

include_once 'form.html';
include_once 'footer.html';

?>
