<?php //logout.php
// clears session and returns user to main site
include_once "../jscommon.php";

    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);

redirect("../index.html");
?>