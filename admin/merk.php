<?php

include "../Classes/merk.php";
include "../Classes/database.php";

$merken = Merk::VindtAlleMerken();

?>

<!DOCTYPE html>
<html lang="nl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Speelhuys - Merken</title>

    <link rel="stylesheet" href="../overzicht.css">

</head>

<body>


<header class="site-header">

    <div class="site-logo">

        <h2>Speelhuys</h2>

        <p>Codeblokken</p>

    </div>


    <nav class="top-menu">

        <a href="overzichtadmin.php">
            Overzicht
        </a>

        <a href="#">
            Thema
        </a>

        <a href="merk.php" class="active">
            Merk
        </a>

        <a href="#">
            Leeftijd
        </a>

    </nav>

</header>



<div class="page-layout">


    <aside class="sidebar">

        <h3>Menu</h3>

        <a href="overzichtadmin.php">
            Overzicht
        </a>

        <a href="#">
            Thema
        </a>

        <a href="merk.php" class="active">
            Merk
        </a>

        <a href="#">
            Leeftijd
        </a>

        <a href="#">
            Prijs
        </a>

        <a href="#">
            Steentjes
        </a>

    </aside>



    <main class="content">


        <div class="content-header">

            <div>

                <h2>Merken</h2>

                <p>
                    Bekijk alle beschikbare merken.
                </p>

            </div>


            <form method="get" class="search-form">

                <input
                    type="text"
                    name="zoek"
                    placeholder="Zoek een merk..."
                >

                <button type="submit">
                    Zoeken
                </button>

            </form>

        </div>



        <div class="product-grid">


            <?php foreach ($merken as $merk) { ?>

                <a
                    href="overzichtadmin.php?merk=<?= $merk->id ?>"
                    class="product-card"
                >


                    <div class="product-image">

                        <?php if (!empty($merk->logo)) { ?>

                            <img
                                src="../images/logos/<?= $merk->logo ?>"
                                alt="<?= $merk->naam ?>"
                            >

                        <?php } else { ?>

                            <div class="no-image">
                                Geen logo
                            </div>

                        <?php } ?>

                    </div>


                    <div class="product-info">

                        <h3>
                            <?= $merk->naam ?>
                        </h3>

                        <p>
                            Bekijk pakketten van dit merk
                        </p>

                    </div>


                </a>

            <?php } ?>


        </div>


    </main>

</div>



<footer class="site-footer">

    <h2>Speelhuys</h2>

    <p>
        &copy; 2026 Speelhuys Codeblokken
    </p>

</footer>


</body>

</html>