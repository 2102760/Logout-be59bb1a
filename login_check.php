<?php
    function redirect($url) {
        ob_start();
        header('Location: '.$url);
        ob_end_flush();
        die();
    }
    if (!isset($_COOKIE['loggedInUser'])){
        redirect("login.php");
        setcookie("error", "U moet hiervoor ingelogd zijn", time() + 36, "/");
    } else {
        echo '<form action="logout.php" method="post"><input type="submit" value="log uit"></form>';
    }
?>