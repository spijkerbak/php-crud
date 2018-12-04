<?php
// connect to database
require 'db.php';

// get url parameter
$KlantNr = $_GET['KlantNr'];

// delete record
$sql = 'DELETE FROM Klant WHERE KlantNr = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$KlantNr]);

// return to list
start('customer-list.php');