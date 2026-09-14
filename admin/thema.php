<?php

include "../Classes/database.php";
include "../Classes/theme.php";

$themas = Theme::VindtalleThemes();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Thema's - Speelhuys</title>

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

        <a href="thema.php" class="active">
            Thema
        </a>

        <a href="merk.php">
            Merk
        </a>

        <a href="sets.php">
            Sets
        </a>

    </aside>


    <main class="content">

        <div class="container-header">

            <div>

                <h1>Thema's</h1>

                <p>
                    Kies een thema om de bijbehorende sets te bekijken.
                </p>

            </div>

        </div>


        <div class="product-grid">

            <?php foreach ($themas as $thema) { ?>

                <a
                    href="overzichtadmin.php?thema=<?= $thema->id ?>"
                    class="product-card"
                >

                    <div class="product-info">

                        <h3>
                            <?= $thema->naam ?>
                        </h3>

                    </div>

                </a>

            <?php } ?>

        </div>

    </main>

</div>


<footer class="site-footer">

    <h2>Speelhuys</h2>

</footer>

</body>

</html>