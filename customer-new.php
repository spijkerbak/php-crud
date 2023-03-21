<?php
require 'db.php';

// insert an empty record
$sql = "INSERT INTO Klant (KlantNaam, VerkNr, PlaatsHfdkntr) VALUES('', NULL, '')";
$stmt = $pdo->prepare($sql);
$stmt->execute();
checkSQL($stmt);

// redirect to list
header('location: customer-list.php');

