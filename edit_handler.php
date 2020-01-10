<?php
include 'login_check.php';
function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}
$host = '127.0.0.1';
$db = 'netland';
$user = 'root';
$pass = '7DfAteqddW7MQ299';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

var_dump($_POST);

$id = $_POST['id'];

$query = <<<EOT
                        UPDATE netland.media 
                        SET
                            country = '${_POST['country']}',
                            language = '${_POST['language']}',
                            rating = '${_POST['rating']}',
                            title = '${_POST['title']}',
                            description = '${_POST['description']}'
                        WHERE 
                            id = '${id}'
                        ;
                    EOT
;

$result = $pdo->query($query)->fetch();

redirect("index.php");
?>