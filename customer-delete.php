<?php

require 'db.php';

// get url parameter
$KlantNr = $_GET['KlantNr'];

// delete record
$sql = 'DELETE FROM Klant WHERE KlantNr = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$KlantNr]);
checkSQL($stmt);

// redirect to list
header('location: customer-list.php');

