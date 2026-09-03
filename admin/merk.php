<?php
include "../Classes/merk.php";
include "../Classes/database.php";

$merken = Merk::VindtAlleMerken();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merk</title>
    <link rel="stylesheet" href="../merk.css">
</head>
<body>
    <header class="site-header">
        <div class="site-logo">
           <h2>Speelhuys</h2> 
        </div>
        <nav class="top menu">
            <a href="index.php" class="active">Overzicht</a>
            <a href="#">Thema</a>
            <a href="merk.php class="active">Merk</a>
            <a href="#">Leeftijd</a>
        </nav>
    </header>
    <div class="page-layout">
        <aside class="sidebar">
            <h3>Menu</h3>
            <a href="index.php">Overzicht</a>
            <a href="#">Thema</a>
            <a href="merk.php" class="active">Merk</a>
            <a href="#">Leeftijd</a>
            <a href="#">Prijs</a>
            <a href="#">Steentjes</a>
        </aside>
        <main class="content">
            <div class="container-header">
                <div>
                    <h2>Merk</h2>
                    <p>Bekijk alle beschikbare merken.</p>
                </div>
                <form method="get" class="search-form">
                    <input type="text" name="zoek" placeholder="Zoek een merk...">
                    <button type="submit">Zoeken</button>
                </form>
            </div>
            <div class="product-grid">
                <?php foreach ($merken as $merk) { ?>
                <a href="index.php?merk=<?= $merk->id ?>" class="product-card">
                    <div class="brand-logo">
                        <img src="images/<?= $merk->logo ?>" alt="<?= $merk->naam ?>">
                    </div>
                    <div class="brand-name">
                        <?= $merk->naam ?>
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