<?php
require 'db.php';

// insert record
$sql = "INSERT INTO Klant (KlantNaam, VerkNr, PlaatsHfdkntr) VALUES('', NULL, '')";
$stmt = $pdo->prepare($sql);
$stmt->execute();
checkSQL($stmt);

// return to list
header('location: customer-list.php');

