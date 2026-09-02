<?php
    $errorbericht = "";
    if(!empty($_POST["username"])) {
        include "../Classes/gebruiker.php";
        include "../Classes/database.php";

        $username = $_POST["username"];
        $password = $_POST["password"];

        if (empty($username) || empty($password)) {
            $errorbericht = "Een van de velden is niet ingevuld.";
        } else {
            $gebruiker = Gebruiker::vindtGebruiker($username, $password);

            if ($gebruiker) {
                header("Location: overzichtadmin.php");
                exit;
            } else {
                $errorbericht = "Geen geldige gebruiker";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="login-container">
    <div class="login-box">
        <h2>Inloggen:</h2>
        <form method="post" action="index.php">
            <div class="input-box">
                <input type="text" name="username" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" required>
            </div>
            <input type="submit" value="Login" class="login-button">
        </form>
    </div>
</div>
</div>
</header>
</body>
</html>