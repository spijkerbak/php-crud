<?php
// UTF-8 NΟ BOM 
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

require 'db.php';

// get result set
$sql = "SELECT * FROM Klant ORDER BY KlantNaam";
$rs = $pdo->query($sql, PDO::FETCH_OBJ);
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
            <a href=".">home</a>
            <a href="customer-new.php?<?= rand(1, 10000) ?>" title="add a record">new</a>
        </nav>

        <h1>Klanten</h1>
        <!-- show result set -->
        <table>
            <tr>
                <th>
                <th>Nummer
                <th>Naam
                <th>Verkoper
                <th>Hoofdkantoor
                <th>
            </tr>
            <?php while ($row = $rs->fetch()) { ?>
                <tr>
                    <td class="button"><a title="edit" href="customer-edit.php?KlantNr=<?= $row->KlantNr ?>">?</a>
                    <td><?= $row->KlantNr ?>
                    <td><?= $row->KlantNaam ?>
                    <td><?= $row->VerkNr ?>
                    <td><?= $row->PlaatsHfdkntr ?>
                    <td class="button"><a title="delete" href="customer-delete.php?KlantNr=<?= $row->KlantNr ?>">X</a>
                </tr>
            <?php } ?>
        </table>
    </body>

</html>

