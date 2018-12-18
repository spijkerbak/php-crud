<?php
// UTF-8 NΟ BOM
session_start();
require 'db.php';
$sql = file_get_contents('create-tables.sql');
$sql = str_replace("\xEF\xBB\xBF", '', $sql); // remove BOM
$pdo->query($sql);
if(isset($_SESSION['list'])) {
    header('location: ' . $_SESSION['list']);   
} else {
    header('location: .');
}
