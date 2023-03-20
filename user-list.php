<?php
include 'db.php';

// get result set
$sql = "SELECT * FROM User";
$rs = $pdo->query($sql, PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="nl">

    <head>
        <meta charset="UTF-8">
        <title>List</title>
        <link type="text/css" rel="stylesheet" href="layout.css">
    </head>

    <body>

        <nav>
            <?php require 'menu.inc.php'; ?>
        </nav>

        <h1>Gebruikers</h1>
        <!-- show result set -->
        <table>
            <tr>
                <th>
                <th>Username
                <th>Passwordhash
                <th>
            </tr>
            <?php while ($row = $rs->fetch()) { ?>
                <tr>
                    <td class="button"><a title="edit" href="user-edit.php?Username=<?= $row->Username ?>">?</a>
                    <td><?= $row->Username ?>
                    <td><?= $row->PasswordHash ?>
                    <td class="button"><a title="delete" href="user-delete.php?Username=<?= $row->Username ?>">X</a>
                </tr>
            <?php } ?>
        </table>
    </body>

</html>

