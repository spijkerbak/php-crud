<!doctype html>
<html lang="nl">
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="layout.css">
    </head>
    <body>

        <form method="post" action="login_check.php">
            <nav>
                <a href="." title="home">home</a>
                <a href="customer-list.php" title="back to list">back</a>
            </nav>
            <label>
                Gebruikersnaam
                <input type="text" name="username">
            </label>

            <label>
                Wachtwoord
                <input type="password" name="password">
            </label>
            <input type="submit" value="login">
        </form>

    </body>
</html>
