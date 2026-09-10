<?php

include "../Classes/database.php";
include "../Classes/merk.php";

$merken = Merk::VindtAlleMerken();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Merken - Speelhuys</title>

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

        <a href="merk.php" class="active">
            Merk
        </a>

        <a href="leeftijd.php">
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


        <div class="container-header">

            <div>

                <h1>Merken</h1>

                <p>
                    Bekijk alle beschikbare merken.
                </p>

            </div>

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