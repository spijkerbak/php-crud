<?php
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

// connect to database
require 'db.php';

// get result set
$sql = "SELECT * FROM Klant ORDER BY KlantNaam";
$rs = $pdo->query($sql, PDO::FETCH_OBJ);
sqlCheck($rs);
?>
<!DOCTYPE html>
<html lang="nl">

    <head>
        <meta charset="UTF-8">
        <title>List</title>
        <link type="text/css" rel="stylesheet" href="layout.css">
    </head>
    
    <body>

        <nav>
            <button title="home" onclick="window.location = 'index.php'">🏠</button>
            <a href="customer-new.php" title="add a record">➕</a>
        </nav>

        <h1>Klanten</h1>
        <!-- show result set -->
        <table>
            <tr>
                <th>
                <th>
                <th>Nummer
                <th>Naam
                <th>Verkoper
                <th>Hoofdkantoor
            </tr>
            <?php while ($row = $rs->fetch()) { ?>
                <tr>
                    <td><a title="delete" href="customer-delete.php?KlantNr=<?= $row->KlantNr ?>">X</a>
                    <td><a title="edit" href="customer-edit.php?KlantNr=<?= $row->KlantNr ?>">✎</a>
                    <td><?= $row->KlantNr ?>
                    <td><?= $row->KlantNaam ?>
                    <td><?= $row->VerkNr ?>
                    <td><?= $row->PlaatsHfdkntr ?>
                </tr>
            <?php } ?>
        </table>
    </body>

</html>

