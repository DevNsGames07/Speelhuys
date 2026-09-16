<?php

include "../Classes/database.php";
include "../Classes/sets.php";

$sets = Sets::AlleSets(0, 100);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Speelhuys - Sets</title>
    <link rel="stylesheet" href="../overzicht.css">
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

<nav class="navbar navbar-expand-lg nav-bar" data-bs-theme="light">
    <div class="container-fluid">
        <span class="navbar-brand">Speelhuys </br> codeblokken</span>
    </div>
</nav> 


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

            <div>

                <h1>Sets</h1>

                <p>
                    Beheer alle sets van Speelhuys.
                </p>

            </div>
            <a href="settoevoegen.php" class="add-button">
        + Set toevoegen
    </a>

        </div>


        <div class="product-grid">

            <?php foreach ($sets as $set) { ?>

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

                        <h3>
                            <?= $set->naam ?>
                        </h3>

                        <p>
                            Merk ID: <?= $set->merkid ?>
                        </p>

                        <p>
                            Thema ID: <?= $set->themeid ?>
                        </p>

                        <p>
                            <?= $set->stukjes ?> steentjes
                        </p>

                        <p>
                            Leeftijd: <?= $set->age ?> jaar
                        </p>

                        <p>
                            Voorraad: <?= $set->vooraad ?>
                        </p>

                        <strong>
                            € <?= number_format($set->price, 2, ',', '.') ?>
                        </strong>

                        <br><br>

                        <a
                            href="detail.php?id=<?= $set->id ?>"
                            class="detail-button"
                        >
                            Bekijk product
                        </a>

                    </div>

                </div>

            <?php } ?>

        </div>

    </main>

</div>


<footer class="site-footer">

    <h2>Speelhuys</h2>

</footer>

</body>

</html>