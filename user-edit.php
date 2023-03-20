<?php
require 'db.php';

// get url parameter
$Username = $_GET['Username'];

// get record
$sql = "SELECT * FROM `User` WHERE `Username` = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$Username]);
checkSQL($stmt);

$row = $stmt->fetch(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="nl">

    <head>
        <meta charset="UTF-8">
        <title>List</title>
        <link type="text/css" rel="stylesheet" href="layout.css">
    </head>

    <body>

        <form method="post" action="user-save.php">

            <nav>
                <a href="." title="home">home</a>
                <a href="user-list.php" title="back to list">back</a>
                <button title="save" type="submit">save</button>
                <button title="reset" type="reset">reset</button>
            </nav>


            <h1>Gebruiker</h1>

            <label>
                Naam
                <input type="text" name="Username" value="<?= $row->Username ?>">
            </label>

        </form>
    </body>

</html>

