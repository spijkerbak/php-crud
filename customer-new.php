<?php

// connect to database
require 'db.php';

// insert record
$sql = "INSERT INTO Klant (KlantNaam, VerkNr, PlaatsHfdkntr) VALUES('', NULL, '')";
$stmt = $pdo->prepare($sql);
$stmt->execute();
start('customer-list.php');

