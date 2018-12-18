<?php
// UTF-8 NΟ BOM 
session_start();
$_SESSION['list'] = 'customer-list-2.php';

include 'db.php';

// get result set
$sql = "SELECT * FROM Klant K "
        . " LEFT JOIN Verkoper V ON K.VerkNr = V.VerkNr "
        . " ORDER BY KlantNaam";
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
            <?php require 'menu.inc.php'; ?>
            <a href = "customer-new.php?page=customer-list-2.php" title="add a record">new</a>
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
                    <td><?= $row->VerkNaam ?>
                    <td><?= $row->PlaatsHfdkntr ?>
                    <td class="button"><a title="delete" href="customer-delete.php?KlantNr=<?= $row->KlantNr ?>">X</a>
                </tr>
            <?php } ?>
        </table>
    </body>

</html>

