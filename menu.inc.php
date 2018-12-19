<a href = ".">home</a>
<?php if (isset($_SESSION['username'])) { ?>
    <a href = "logout.php">logout</a>
<?php } else { ?>
    <a href = "login.php">login</a>
<?php } ?>
<a href = "create-tables.php">reset database</a>
<a href = "customer-list.php">klanten</a>
