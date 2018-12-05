<?php // UTF-8 NΟ BOM
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

require 'db.php'; 

// get url parameter
$KlantNr = $_GET['KlantNr'];

// get record
$sql = "SELECT * FROM Klant WHERE KlantNr = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$KlantNr]);
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

        <form method="post" action="customer-save.php">
            <nav>
                <a href="index.php" title="home">home</a>
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
                <input type="text" name="VerkNr" value="<?= $row->VerkNr ?>">
            </label>

            <label>
                Hoofdkantoor
                <input type="text" name="PlaatsHfdkntr" value="<?= $row->PlaatsHfdkntr ?>">
            </label>

        </form>
    </body>

</html>

