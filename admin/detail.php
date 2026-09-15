<?php

include "../Classes/database.php";
include "../Classes/sets.php";

$id = $_GET["id"] ?? null;

$set = Sets::find($id);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Speelhuys</title>

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

        <?php if ($set != null) { ?>

            <div class="product-card">

                <div class="product-image">

                    <?php if (!empty($set->image)) { ?>

                        <img
                            src="../images/sets/<?= $set->image ?>"
                            alt="<?= $set->naam ?>"
                        >

                    <?php } else { ?>

                        <div class="no-image">
                            Geen afbeelding
                        </div>

                    <?php } ?>

                </div>


                <div class="product-info">

                    <h1>
                        <?= $set->naam ?>
                    </h1>

                    <p>
                        <strong>Beschrijving:</strong>
                        <?= $set->beschrijving ?>
                    </p>

                    <p>
                        <strong>Merk ID:</strong>
                        <?= $set->merkid ?>
                    </p>

                    <p>
                        <strong>Thema ID:</strong>
                        <?= $set->themeid ?>
                    </p>

                    <p>
                        <strong>Prijs:</strong>
                        € <?= number_format($set->price, 2, ',', '.') ?>
                    </p>

                    <p>
                        <strong>Leeftijd:</strong>
                        <?= $set->age ?> jaar
                    </p>

                    <p>
                        <strong>Aantal steentjes:</strong>
                        <?= $set->stukjes ?>
                    </p>

                    <p>
                        <strong>Voorraad:</strong>
                        <?= $set->vooraad ?>
                    </p>


                    <br>

                    <a href="sets.php" class="detail-button">
                        Terug naar sets
                    </a>

                    <a
                        href="aanpassen.php?id=<?= $set->id ?>"
                        class="detail-button"
                    >
                        Aanpassen
                    </a>

                </div>

            </div>

        <?php } else { ?>

            <h1>Product niet gevonden</h1>

            <p>
                Deze set bestaat niet.
            </p>

            <a href="sets.php" class="detail-button">
                Terug naar sets
            </a>

        <?php } ?>

    </main>

</div>


<footer class="site-footer">

    <h2>Speelhuys</h2>

</footer>

</body>

</html>