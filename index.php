<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <?php
        include 'login_check.php';
        function select($quary){
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

            $formatResult = array();

            $rawResult = $pdo->query($quary);
            while ($row = $rawResult->fetch()) {
                $rowResult = array();

                foreach ($row as $collum => $value) {
                    $rowResult[$collum] = $value;
                }

                $formatResult[] = $rowResult;
            }

            return $formatResult;
        }
    ?>
    <h1>Welkom op het netland beheerders paneel</h1>

    <a href="create.php">add</a>

    <h3>Series</h3>

    <table>
        <thead>
            <th>Titel</th>
            <th>Rating</th>
            <th></th>
        </thead>
        <tbody>
            <?php
                $rows = select('SELECT * FROM media WHERE serie = true');
                foreach ($rows as $row) {
                    echo <<<EOT
                        <tr>
                            <td>${row['title']}</td>
                            <td>${row['rating']}</td>
                            <td><a href="info.php?id=${row['id']}">Meer info</a></td>
                        </tr>
                    EOT;
                }
            ?>
        </tbody>
    </table>


    <h3>Films</h3>

    <table>
        <thead>
            <th>Titel</th>
            <th>Beoordeling</th>
            <th></th>
        </thead>
        <tbody>
            <?php
            $rows = select('SELECT * FROM media WHERE serie = false');
            foreach ($rows as $row) {
                echo <<<EOT
                            <tr>
                                <td>${row['title']}</td>
                                <td>${row['rating']}</td>
                                <td><a href="info.php?id=${row['id']}">Meer info</a></td>
                            </tr>
                        EOT;
            }
            ?>
        </tbody>
    </table>
</body>
</html>