﻿<?php
require 'db.php';

// get url parameter
$KlantNr = $_GET['KlantNr'];

// get record
$sql = "SELECT * FROM Klant WHERE KlantNr = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$KlantNr]);
checkSQL($stmt);

$row = $stmt->fetch(PDO::FETCH_OBJ);

function generateSelectOption() {
    global $pdo;
    $sql = 'SELECT `VerkNr`, `VerkNaam` FROM `Verkoper` ORDER BY `VerkNaam`';
    $rs = $pdo->query($sql, PDO::FETCH_OBJ);
    echo "<select name='VerkNr'>\n";
    while ($row = $rs->fetch()) {
        echo "<option value='{$row->VerkNr}'>{$row->VerkNaam}</option>\n";
    }
    echo '</select>';
}
?>
<!DOCTYPE html>
<html lang="nl">

    <head>
        <meta charset="UTF-8">
        <title>List</title>
        <link type="text/css" rel="stylesheet" href="layout.css">
    </head>

    <body>

        <form method="post" action="customer-save.php">

            <nav>
                <a href="." title="home">home</a>
                <a href="customer-list.php" title="back to list">back</a>
                <button title="save" type="submit">save</button>
                <button title="reset" type="reset">reset</button>
            </nav>


            <h1>Klant</h1>

            <label>
                Nummer
                <input type="text" readonly name="KlantNr" value="<?= $row->KlantNr ?>">
            </label>

            <label>
                Naam
                <input type="text" name="KlantNaam" value="<?= $row->KlantNaam ?>">
            </label>

            <label>
                Verkoper
                <?php generateSelectOption(); ?>
            </label>

            <label>
                Hoofdkantoor
                <input type="text" name="PlaatsHfdkntr" value="<?= $row->PlaatsHfdkntr ?>">
            </label>

        </form>
    </body>

</html>

