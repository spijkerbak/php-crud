<?php

// connect to database
require 'db.php';

// get post parameter
$KlantNr = $_POST['KlantNr'];
$KlantNaam = $_POST['KlantNaam'];
$VerkNr = $_POST['VerkNr'];
$PlaatsHfdkntr = $_POST['PlaatsHfdkntr'];

// update record
$sql = "UPDATE Klant SET "
        . "KlantNaam = ?, "
        . "VerkNr = ?, "
        . "PlaatsHfdkntr = ? "
        . "WHERE KlantNr = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$KlantNaam, $VerkNr, $PlaatsHfdkntr, $KlantNr]);

// check result 
// - back to list if ok
// - back to edit on error
if (sqlCheckSilently($stmt)) {
    header('location: customer-list.php');
} else {
    header("location: customer-edit.php?KlantNr=$KlantNr");
}