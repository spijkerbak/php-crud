<?php
// connect to database
$dsn = 'mysql:dbname=md136282db448331;host=db.spijkerman.nl;charset=utf8'; // no hyphen in utf8
$user = 'md136282db448331';
$pass = 'crudcrudcrud';
try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    die('connection failed: ' . $e->getMessage());
}

// enable error messages
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

// call this after a query that SHOULD NOT go wrong
function sqlCheck($q) {
    if ($q === false) {
        die();
    }
    $info = $q->errorInfo();
    if ($info[0] != 0) {
        print_r($info);
        die();
    }
}

// call this after a query that COULD go wrong on user input
function sqlCheckSilently($q) {
    if ($q === false) {
        return false;
    }
    $info = $q->errorInfo();
    if ($info[0] != 0) {
        return false;
    }
    return true;
}

// redirect to page, add dummy parameter to force reload
function start($page) {
    header("location: $page");
//    if(strpos($page, '?') > 0) {
//        header("location: $page&" . rand(10000,99999));
//    } else {
//        header("location: $page?" . rand(10000,99999));
//    }
    exit;
}
