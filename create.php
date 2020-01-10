<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<a href="index.php">Terug</a>

<form action="create_handler.php" method="post">
    <table>
        <tbody>
        <tr>
            <td><strong>Serie</strong></td>
            <td><input type="checkbox" name="serie" ></td>
        </tr>
        <tr>
            <td><strong>Titel</strong></td>
            <td><input type="text" name="title" ></td>
        </tr>
        <tr>
            <td><strong>Beoordeling</strong></td>
            <td><input type="text"name="rating" ></td>
        </tr>
        <tr>
            <td><strong>Country</strong></td>
            <td><input type="text" name="country" ></td>
        </tr>
        <tr>
            <td><strong>Language</strong></td>
            <td><input type="text" name="language" ></td>
        </tr>
        <tr>
            <td><strong>Beschrijving</strong></td>
            <td><textarea name="description" cols="80" rows="10"></textarea></td>
        </tr>
        </tbody>
    </table>
    <input type="submit">
</form>
</body>
</html>