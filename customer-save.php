<?php
require 'db.php';

// get post parameter
$KlantNr = $_POST['KlantNr'];
$KlantNaam = $_POST['KlantNaam'];
$VerkNr = $_POST['VerkNr'];
$PlaatsHfdkntr = $_POST['PlaatsHfdkntr'];

if ($VerkNr == '') {
    $VerkNr = null;
}

// update record
$sql = "UPDATE Klant SET KlantNaam = ?, VerkNr = ?, PlaatsHfdkntr = ? WHERE KlantNr = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$KlantNaam, $VerkNr, $PlaatsHfdkntr, $KlantNr]);
checkSQL($stmt);

// redirect to list
header('location: customer-list.php');
