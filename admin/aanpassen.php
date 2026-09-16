<?php

include "../Classes/database.php";
include "../Classes/sets.php";
include "../Classes/merk.php";
include "../Classes/theme.php";

$id = $_GET["id"];

$set = Sets::find($id);

$merken = Merk::VindtAlleMerken();
$themas = Theme::VindtalleThemes();

if ($set == null) {
    header("Location: sets.php?message=Set bestaat niet");
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
        WHERE set_id = '$id'";

    $conn->query($sql);

    $conn->close();

    header("Location: detail.php?id=$id");
    exit;
}

?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Set aanpassen</title>
    <link rel="stylesheet" href="../overzicht.css">
</head>

<body>

<h1>Set aanpassen</h1>

<form method="post">

    <label>Naam:</label><br>
    <input 
        type="text" 
        name="naam" 
        value="<?= $set->naam ?>" 
        required
    >
    <br><br>

    <label>Beschrijving:</label><br>
    <textarea name="beschrijving" required><?= $set->beschrijving ?></textarea>
    <br><br>

    <label>Merk:</label><br>
    <select name="merkid" required>

        <?php foreach ($merken as $merk) { ?>

            <option 
                value="<?= $merk->id ?>"
                <?= $set->merkid == $merk->id ? "selected" : "" ?>
            >
                <?= $merk->naam ?>
            </option>

        <?php } ?>

    </select>
    <br><br>

    <label>Thema:</label><br>
    <select name="themeid" required>

        <?php foreach ($themas as $thema) { ?>

            <option 
                value="<?= $thema->id ?>"
                <?= $set->themeid == $thema->id ? "selected" : "" ?>
            >
                <?= $thema->naam ?>
            </option>

        <?php } ?>

    </select>
    <br><br>

    <label>Afbeelding:</label><br>
    <input 
        type="text" 
        name="image" 
        value="<?= $set->image ?>" 
        required
    >
    <br><br>

    <label>Prijs:</label><br>
    <input 
        type="number" 
        step="0.01" 
        name="price" 
        value="<?= $set->price ?>" 
        required
    >
    <br><br>

    <label>Leeftijd:</label><br>
    <input 
        type="number" 
        name="age" 
        value="<?= $set->age ?>" 
        required
    >
    <br><br>

    <label>Aantal steentjes:</label><br>
    <input 
        type="number" 
        name="stukjes" 
        value="<?= $set->stukjes ?>" 
        required
    >
    <br><br>

    <label>Voorraad:</label><br>
    <input 
        type="number" 
        name="voorraad" 
        value="<?= $set->vooraad ?>" 
        required
    >
    <br><br>

    <button type="submit" name="aanpassen">
        Opslaan
    </button>

    <a href="detail.php?id=<?= $set->id ?>">
        Annuleren
    </a>

</form>

</body>
</html>