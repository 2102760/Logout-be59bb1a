<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <h1>Inloggen</h1>
    <?php
        function redirect($url) {
            ob_start();
            header('Location: '.$url);
            ob_end_flush();
            die();
        }
        if (isset($_COOKIE['loggedInUser'])){
            redirect("index.php");
        }
        if (isset($_COOKIE['error'])){
            echo '<div class="error">' . $_COOKIE['error'] .'</div>';
            unset($_COOKIE['error']);
            setcookie('error', null, -1, '/');
        }
    ?>
    <form action="login_handler.php" method="post">
        <div class="form-group">
            <label for="username">Gebruikersnaam:</label><br>
            <input type="text" name="username" id="username" required>
        </div>

        <div class="form-group">
            <label for="password">Wachtwoord:</label><br>
            <input type="password" name="password" id="password" required>
        </div>

        <div class="form-group">
            <input type="submit">
        </div>
    </form>
</body>
</html>