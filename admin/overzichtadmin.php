<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Speelhuys - Overzicht</title>

    <link rel="stylesheet" href="../overzicht.css">
</head>

<body>

<header class="site-header">

    <div class="site-logo">
        <h2>Speelhuys</h2>
        <p>Codeblokken</p>
    </div>

    <nav class="top-menu">
        <a href="overzichtadmin.php" class="active">Overzicht</a>
        <a href="#">Thema</a>
        <a href="#">Merk</a>
        <a href="#">Leeftijd</a>
    </nav>

</header>


<div class="page-layout">

    <aside class="sidebar">

        <h3>Menu</h3>

        <a href="overzichtadmin.php">Overzicht</a>
        <a href="#">Thema</a>
        <a href="#">Merk</a>
        <a href="#">Leeftijd</a>
        <a href="#">Prijs</a>
        <a href="#">Steentjes</a>

    </aside>


    <main class="content">

        <div class="content-header">

            <div>
                <h2>Codeblokken pakketten</h2>
                <p>Bekijk alle beschikbare pakketten.</p>
            </div>


            <form method="get" class="search-form">

                <input
                    type="text"
                    name="zoek"
                    placeholder="Zoek een pakket..."
                >

                <button type="submit">
                    Zoeken
                </button>

            </form>

        </div>


        <div class="product-grid">

            <?php
            $sets = $sets ?? [];

            foreach ($sets as $set) {
            ?>

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
                            <strong>Merk:</strong>
                            <?= $set->merk ?>
                        </p>

                        <p>
                            <strong>Steentjes:</strong>
                            <?= $set->aantal_steentjes ?>
                        </p>

                        <p class="price">
                            € <?= number_format($set->prijs, 2, ',', '.') ?>
                        </p>


                        <a
                            href="detail.php?id=<?= $set->id ?>"
                            class="detail-button"
                        >
                            Bekijk product
                        </a>

                    </div>

                </div>

            <?php
            }
            ?>

        </div>


        <div class="pagination">

            <a href="#">&lt;</a>

            <a href="#" class="current">1</a>

            <a href="#">2</a>

            <a href="#">3</a>

            <a href="#">&gt;</a>

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