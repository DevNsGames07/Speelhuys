<?php

include "../Classes/database.php";
include "../Classes/sets.php";

$sets = Sets::find($_GET["id"]);

if ($sets == null) {
    header("Location: overzichtadmin.php?message=Set bestaat niet.");
    exit;
}

if (isset($_POST["aanpassen"])) {

    $naam = $_POST["naam"];
    $beschrijving = $_POST["beschrijving"];
    $merkid = $_POST["merkid"];
    $themeid = $_POST["themeid"];
    $image = $_POST["image"];
    $price = $_POST["price"];
    $age = $_POST["age"];
    $stukjes = $_POST["stukjes"];
    $voorraad = $_POST["voorraad"];

    $conn = Database::start();

    $sql = "UPDATE sets SET
        set_name = '$naam',
        set_description = '$beschrijving',
        set_brand_id = '$merkid',
        set_theme_id = '$themeid',
        set_image = '$image',
        set_price = '$price',
        set_age = '$age',
        set_pieces = '$stukjes',
        set_stock = '$voorraad'
        WHERE set_id = '".$_GET["id"]."'";

    $conn->query($sql);

    $conn->close();

    header("Location: detail.php?id=".$_GET["id"]);
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Set aanpassen</title>
    <link rel="stylesheet" href="../overzicht.css">
</head>

<body>

<h1>Set aanpassen</h1>

<form method="post">

    <label>Naam:</label><br>
    <input type="text" name="naam" value="<?= $sets->naam ?>">
    <br><br>

    <label>Beschrijving:</label><br>
    <textarea name="beschrijving"><?= $sets->beschrijving ?></textarea>
    <br><br>

    <label>Merk:</label><br>
    <input type="number" name="merkid" value="<?= $sets->merkid ?>">
    <br><br>

    <label>Thema:</label><br>
    <input type="number" name="themeid" value="<?= $sets->themeid ?>">
    <br><br>

    <label>Afbeelding:</label><br>
    <input type="text" name="image" value="<?= $sets->image ?>">
    <br><br>

    <label>Prijs:</label><br>
    <input type="number" step="0.01" name="price" value="<?= $sets->price ?>">
    <br><br>

    <label>Leeftijd:</label><br>
    <input type="number" name="age" value="<?= $sets->age ?>">
    <br><br>

    <label>Steentjes:</label><br>
    <input type="number" name="stukjes" value="<?= $sets->stukjes ?>">
    <br><br>

    <label>Voorraad:</label><br>
    <input type="number" name="voorraad" value="<?= $sets->vooraad ?>">
    <br><br>

    <button type="submit" name="aanpassen">
        Opslaan
    </button>

    <a href="detail.php?id=<?= $sets->id ?>">
        Annuleren
    </a>

</form>

</body>
</html>