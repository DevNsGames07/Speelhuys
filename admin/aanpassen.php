<?php

include "../Classes/database.php";
include "../Classes/sets.php";
include "../Classes/merk.php";
include "../Classes/theme.php";

$id = $_GET["id"];

$set = Sets::find($id);

$merken = Merk::VindtAlleMerken();
$themas = Theme::VindtalleThemes();


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
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Set aanpassen</title>

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

        <div class="container-header">

            <h1>Set aanpassen</h1>

        </div>


        <form method="POST">

            <p>
                <label>Naam:</label><br>

                <input
                    type="text"
                    name="naam"
                    value="<?= $set->naam ?>"
                    required
                >
            </p>


            <p>
                <label>Beschrijving:</label><br>

                <textarea
                    name="beschrijving"
                    required
                ><?= $set->beschrijving ?></textarea>
            </p>


            <p>
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

            </p>


            <p>
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

            </p>


            <p>
                <label>Afbeelding:</label><br>

                <input
                    type="text"
                    name="image"
                    value="<?= $set->image ?>"
                >
            </p>


            <p>
                <label>Prijs:</label><br>

                <input
                    type="number"
                    name="price"
                    step="0.01"
                    value="<?= $set->price ?>"
                    required
                >
            </p>


            <p>
                <label>Leeftijd:</label><br>

                <input
                    type="number"
                    name="age"
                    value="<?= $set->age ?>"
                    required
                >
            </p>


            <p>
                <label>Aantal steentjes:</label><br>

                <input
                    type="number"
                    name="stukjes"
                    value="<?= $set->stukjes ?>"
                    required
                >
            </p>


            <p>
                <label>Voorraad:</label><br>

                <input
                    type="number"
                    name="voorraad"
                    value="<?= $set->vooraad ?>"
                    required
                >
            </p>


            <button
                type="submit"
                name="aanpassen"
            >
                Opslaan
            </button>


            <a href="detail.php?id=<?= $set->id ?>">
                Annuleren
            </a>

        </form>

    </main>

</div>


<footer class="site-footer">

    <h2>Speelhuys</h2>
</footer>

</body>

</html>