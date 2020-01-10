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

if (isset($_POST['serie'])){
    $serie = 1;
} else {
    $serie = 0;
}


$query = <<<EOT
                        INSERT INTO netland.media (country, description, language, rating, title, serie)
                        VALUES (
                            '${_POST['country']}',
                            '${_POST['description']}',
                            '${_POST['language']}',
                            '${_POST['rating']}',
                            '${_POST['title']}',
                            '${serie}'
                        );
                    EOT
;

$result = $pdo->query($query)->fetch();

redirect("index.php");
?>