<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="nl">

    <head>
        <meta charset="UTF-8">
        <title>Home</title>
        <link type="text/css" rel="stylesheet" href="layout.css">
    </head>

    <body>

        <nav>
            <?php require 'menu.inc.php'; ?>
        </nav>
        
        <h1>Home</h1>
        <p>CRUD example V2.2</p>
        <p>Get sources on <a target="github" href="http://github.com/spijkerbak/php-crud.git">Github</a>.
        <p><a href="../crud-simple/">Another example available</a></p>
        
        <p><?= $_SESSION['username']??'' ?></p>
    </body>

</html>