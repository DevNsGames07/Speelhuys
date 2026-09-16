<?php
$errorbericht = "";
if (!empty($_POST["username"])) {
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
            setcookie("gebruiker-id", $gebruiker->id, strtotime("+1 month"), "/"); // Wordt de waardes in de database gezet
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Speelhuys - login</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg nav-bar" data-bs-theme="light">
        <div class="container-fluid">
            <span class="navbar-brand">Speelhuys </br> codeblokken</span>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Log in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Winkelwagen</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <img src="../images/bg/backG.png" class="bg-log">

    <div class="card position-absolute top-50 start-50 translate-middle" style="width: 26rem;">
        <div class="card-body text-center">
            <h3>Inloggen:</h3>
            <form method="post" action="index.php">
                <div class="input-box">
                    <input type="text" class="rounded" name="username" placeholder="username..."required>
                </div>
                <div class="input-box">
                    <input type="password" class="rounded" name="password" placeholder="password..."required>
                </div>
                <input type="submit" value="Login" class="login-button">
            </form>
        </div>
    </div>
</body>

</html>