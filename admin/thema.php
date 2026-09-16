<?php

include "../Classes/database.php";
include "../Classes/theme.php";

$themas = Theme::VindtalleThemes();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Speelhuys - Thema</title>
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