<?php

include "../Classes/database.php";
include "../Classes/sets.php";
include "../Classes/merk.php";
include "../Classes/theme.php";

$page = $_GET['page'] ?? 1;

$merkid = $_GET['merk'] ?? null;
$themaid = $_GET['thema'] ?? null;
$sort = $_GET['sort'] ?? '';

$merken = Merk::VindtAlleMerken();
$themas = Theme::VindtalleThemes();

$perPage = 9;
$startAt = ($page - 1) * $perPage;


if ($merkid != null || $themaid != null) {

    $sets = Sets::AlleSetsGesoorteerdEnGefilterd(
        $sort,
        $startAt,
        $perPage,
        $themaid,
        $merkid
    );

    $totalSets = Sets::AantalSetsGefilterd(
        $themaid,
        $merkid
    );

} else {

    $sets = Sets::AlleSetsGesoorteerd(
        $sort,
        $startAt,
        $perPage
    );

    $totalSets = Sets::AantalSets();
}


$totalPages = ceil($totalSets / $perPage);

?>

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
</header>    

<div class="page-layout">

    <aside class="sidebar">

        <h3>Menu</h3>

        <a href="overzichtadmin.php">Overzicht</a>

        <a href="thema.php">Thema</a>
        
        <a href="merk.php">Merk</a>
        
        <a href="sets.php">Sets</a>

    </aside>


    <main class="content">

        <div class="container-header">

            <div>
                <h1>Overzicht</h1>
                <p>Bekijk alle beschikbare pakketten.</p>
            </div>
    
    <form method="GET">
                    
        <label>Merk:</label>
                
            <select name="merk">

    <option value="">Alle merken</option>

    <?php foreach ($merken as $merk) { ?>

        <option
            value="<?= $merk->id ?>"
            <?= $merkid == $merk->id ? 'selected' : '' ?>
        >
            <?= $merk->naam ?>
        </option>

    <?php } ?>

</select>


            <label>Thema:</label>

              <select name="thema">

    <option value="">Alle thema's</option>

    <?php foreach ($themas as $thema) { ?>

        <option
            value="<?= $thema->id ?>"
            <?= $themaid == $thema->id ? 'selected' : '' ?>
        >
            <?= $thema->naam ?>
        </option>

    <?php } ?>

</select>


            <label>Sorteren:</label>

             <select name="sort">

              <option value="">Standaard</option>

              <option value="prijs_oplopend">
                Prijs laag naar hoog
              </option>

              <option value="prijs_aflopend">
                Prijs hoog naar laag
              </option>

              <option value="blokjes_oplopend">
                Steentjes weinig naar veel
              </option>

              <option value="blokjes_aflopend">
                Steentjes veel naar weinig
              </option>

              <option value="leeftijd_oplopend">
                Leeftijd laag naar hoog
              </option>

              <option value="leeftijd_aflopend">
                Leeftijd hoog naar laag
              </option>

    </select>


    <button type="submit">
        Filter
    </button>

  </form>
            
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
                            <?= $set->stukjes ?> steentjes
                        </p>

                        <p>
                            Leeftijd: <?= $set->age ?> jaar
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


        <!-- Pagina's -->

        <div class="pagination">

            <?php if ($page > 1) { ?>

                <a href="?page=<?= $page - 1 ?>">
                    &lt;
                </a>

            <?php } ?>


            <?php for ($i = 1; $i <= $totalPages; $i++) { ?>

                <a
                    href="?page=<?= $i ?>"
                    class="<?= $i == $page ? 'current' : '' ?>"
                >
                    <?= $i ?>
                </a>

            <?php } ?>


            <?php if ($page < $totalPages) { ?>

                <a href="?page=<?= $page + 1 ?>">
                    &gt;
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