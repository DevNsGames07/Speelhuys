<?php

include "../Classes/database.php";
include "../Classes/merk.php";

$merken = Merk::VindtAlleMerken();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Speelhuys - ADMIN</title>
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

        <a href="merk.php" class="active">
            Merk
        </a>

        <a href="sets.php">
            Sets
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