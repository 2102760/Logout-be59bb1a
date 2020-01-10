<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<a href="index.php">Terug</a>
<?php
include 'login_check.php';
$host = '127.0.0.1';
$db   = 'netland';
$user = 'web';
$pass = 'nikO6aDoKafu2ayuSufIBeluGoho5I';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$query = 'SELECT * FROM media WHERE id =' . $_GET['id'];
$result = $pdo->query($query)->fetch();
?>
<h1><?php echo $result['title'] ?> - <?php echo $result['rating'] ?></h1>
<form action="edit_handler.php" method="post">
    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
    <table>
        <tbody>
            <tr>
                <td><strong>Titel</strong></td>
                <td><input type="text" name="title" value="<?php echo $result['title'] ?>"></td>
            </tr>
            <tr>
                <td><strong>Beoordeling</strong></td>
                <td><input type="text"name="rating" value="<?php echo $result['rating'] ?>"></td>
            </tr>
            <tr>
                <td><strong>Country</strong></td>
                <td><input type="text" name="country" value="<?php echo $result['country'] ?>"></td>
            </tr>
            <tr>
                <td><strong>Language</strong></td>
                <td><input type="text" name="language" value="<?php echo $result['language'] ?>"></td>
            </tr>
            <tr>
                <td><strong>Beschrijving</strong></td>
                <td><textarea name="description" cols="80" rows="10"><?php echo $result['description'] ?></textarea></td>
            </tr>
        </tbody>
    </table>
    <input type="submit">
</form>
</body>
</html>