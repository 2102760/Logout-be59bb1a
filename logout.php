<?php
    include 'login_check.php';
    unset($_COOKIE['loggedInUser']);
    setcookie('loggedInUser', null, -1, '/');

    redirect("login.php");
?>