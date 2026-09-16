<?php

include "../Classes/database.php";
include "../Classes/sets.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

    $naam = $_POST["naam"];
    $beschrijving = $_POST["beschrijving"];
    $merkid = $_POST["merkid"];
    $themeId = $_POST["themeId"];
    $image = $_POST["image"];
    $price = $_POST["price"];
    $age = $_POST["age"];
    $stukjes = $_POST["stukjes"];
    $vooraad = $_POST["vooraad"];

    Sets::ToevoegenSet(
        $naam,
        $beschrijving,
        $merkid,
        $themeId,
        $image,
        $price,
        $age,
        $stukjes,
        $vooraad
    );

    header("Location: sets.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Set toevoegen - Speelhuys</title>
    <link rel="stylesheet" href="../overzicht.css">
</head>

<body>

<header class="site-header">
    <div class="site-logo">
        <h2>Speelhuys</h2>
    </div>
</header>

<div class="page-layout">

    <aside class="sidebar">

        <h3>Menu</h3>

        <a href="overzichtadmin.php">
            Overzicht
        </a>

        <a href="thema.php">
            Thema
        </a>

        <a href="merk.php">
            Merk
        </a>

        <a href="sets.php" class="active">
            Sets
        </a>

    </aside>

    <main class="content">

        <h1>Set toevoegen</h1>

        <form method="POST">

            <label>Naam</label>
            <input type="text" name="naam" required> <br>

            <label>Beschrijving</label>
            <textarea name="beschrijving" required></textarea> <br>

            <label>Merk ID</label>
            <input type="number" name="merkid" required> <br>

            <label>Thema ID</label>
            <input type="number" name="themeId" required> <br>

            <label>Afbeelding</label>
            <input type="file" name="image"> <br>

            <label>Prijs</label>
            <input type="number" step="0.01" name="price" required> <br>

            <label>Leeftijd</label>
            <input type="number" name="age" required> <br>

            <label>Aantal stukjes</label>
            <input type="number" name="stukjes" required> <br>

            <label>Voorraad</label>
            <input type="number" name="vooraad" required> <br>

            <br><br>

            <button type="submit" class="add-button">
                Set toevoegen
            </button>

        </form>

    </main>

</div>

</body>
</html>