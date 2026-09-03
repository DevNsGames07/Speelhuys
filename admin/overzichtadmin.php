<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht</title>
    <link rel="stylesheet" href="../overzicht.css">
</head>
<body>
    <header class="site-header">
        <div class="site-logo">
           <h2>Speelhuys</h2> 
        </div>
        <nav class="top menu">
            <a href="index.php" class="active">Overzicht</a>
            <a href="#">Thema</a>
            <a href="#">Merk</a>
            <a href="#">Leeftijd</a>
        </nav>
    </header>
    <div class="page-layout">
        <aside class="sidebar">
            <h3>Menu</h3>
            <a href="index.php">Overzicht</a>
            <a href="#">Thema</a>
            <a href="#">Merk</a>
            <a href="#">Leeftijd</a>
            <a href="#">Prijs</a>
            <a href="#">Steentjes</a>
        </aside>
    <main class="content">
      <div class="container-header">
        <div>
            <p>Bekijk alle beschikbare pakketten.</p>
        </div>
        <form method="get" class="search-form">
            <input type="text" name="zoek" placeholder="Zoek een pakket...">
            <button type="submit">Zoeken</button>
        </form>
      </div>
      <div class="product-grid"">
         <?php $sets = $sets ?? [];
         foreach ($sets as $set) { ?>
         <div class="product-card">
            <div class="product-image">
                <?php if (!empty($set->image)) { ?>
                <img src="images/sets/<?= $set->image ?>" alt="<?= $set->naam ?>">
                <?php } else { ?>
                <div class="no-image">
                    Image not available
                </div>
                <?php } ?>
            </div>

            <div class="product-info">
                <h3>
                    <?= $set->naam ?>
                </h3>
                <p>
                    <?= $set->merk ?>
                </p>
                <p>
                    <?= $set->aantal_steentjes ?> steentjes
                </p>
                <strong>
                    € <?= number_format($set->prijs, 2, ',', '.') ?> 
                </strong>
                <a href="detail.php?id=<?= $set->id ?>" class="detail-button">Bekijk product</a>
            </div>
         </div>
        <?php } ?>
    </div>
    <div class="pagination">
        <a href="#">&lt;</a>
        <a href="#"class="current">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">&gt;</a>
    </div>
  </main>
</div>
    
<footer class="site-footer">
    <h2>Speelhuys</h2>
</footer>    
</body>
</html>