    <?php
    include "./Classes/database.php";
    include "./Classes/sets.php";
    $sets = Sets::AlleSets();
    foreach ($sets as $set) {
    ?>
        //Thema per set.
    <?php
    }
    ?>

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Speelhuys</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <nav>
            <div class="container-fluid">
                <span class="text-white fw-bold">Speelhuys</span>
                <a href="./admin/index.php">log in</a>
            </div>
        </nav>
        <div class="container">
            <div class="card">

            </div>

            <body>
                <nav class="navbar navbar-expand-lg" style="background-color: #1bb19b;" data-bs-theme="light">
                    <div class="container-fluid">
                        <span class="navbar-brand" href="">Speelhuys </br> codeblokken</span>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <a class="nav-link" href="../speelhuys/admin/index.php">Log in</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" aria-disabled="true">Winkelwagen</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="container mt-4">
                    <div class="row">
                        <!-- loopt door bericht en toont ze als cards -->
                        <?php foreach ($sets as $set) { ?>
                            <div class="col-md-4 mb-4">
                                <a href="detail.php?id=<?= $set->id; ?>" class="text-decoration-none text-dark">
                                    <div class="card">
                                        <img src="images/sets/<?= $set->image; ?>" class="card-img-top" alt="<?= $set->naam; ?>" style="height: 180px; object-fit: cover;">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $set->naam; ?></h5>
                                            <p class="card-text text-muted"><?= $set->stukjes; ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </body>
        </div>
    </body>