<?php
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM `user` WHERE `username` = ? AND `password` = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$username, $password]);
checkSQL($stmt);

$row = $stmt->fetch(PDO::FETCH_OBJ);
if($row === FALSE) {
    echo "Helaas";
} else {
    echo "Ja!";
}

   