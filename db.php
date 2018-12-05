<?php

// UTF-8 NΟ BOM
// connection parameters

// local database could be:
// $dsn = 'mysql:dbname=crud;host=localhost;charset=utf8'; // no hyphen in utf8
// $user = 'root';
// $pass = '';

$dsn = 'mysql:dbname=md136282db448331;host=db.spijkerman.nl;charset=utf8'; // no hyphen in utf8
$user = 'md136282db448331';
$pass = 'crud1234';

// connect to database
try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    die('connection failed: ' . $e->getMessage());
}

// enable error messages
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

// function to call after execution of statement
function checkSQL($stmt) {
    $info = $stmt->errorInfo();
    if ($info[0] != '00000') {
        echo $info[2];
        exit;
    }
}
