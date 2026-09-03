    <?php
    include "./Classes/database.php";
    include "./Classes/sets.php";
    $sort = $_GET['sort'] ?? null;

    $perPage = 10;
    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
    $startAt = $perPage * ($page - 1);

    if (!empty($sort)) {
        $sets = Sets::AlleSetsGesoorteerd($sort, $startAt, $perPage);
    } else {
        $sets = Sets::AlleSets();
    }
    ?>

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Speelhuys</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <style>
            .pagination {
                display: flex;
                justify-content: center;
            }

            .pagination a {
                color: black;
                float: left;
                padding: 8px 16px;
                text-decoration: none;
                transition: background-color .3s;
            }

            .pagination a.active {
                background-color: dodgerblue;
                color: white;
            }

            .pagination a:hover:not(.active) {
                background-color: #ddd;
            }
        </style>

    </head>

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
            <div class="row mb-4">
                <div class="col-md-5 ms-auto">
                    <form method="GET" action="">
                        <div class="input-group">
                            <label class="input-group-text bg-white fw-bold" for="sortSelect">Sorteren op:</label>
                            <select class="form-select shadow-sm" id="sortSelect" name="sort" onchange="this.form.submit()">
                                <option value="" selected disabled>Maak een keuze...</option>
                                <option value="prijs_oplopend" <?= $sort == 'prijs_oplopend' ? 'selected' : ''; ?>>Prijs oplopend</option>
                                <option value="prijs_aflopend" <?= $sort == 'prijs_aflopend' ? 'selected' : ''; ?>>Prijs aflopend</option>
                                <option value="blokjes_oplopend" <?= $sort == 'blokjes_oplopend' ? 'selected' : ''; ?>>Aantal blokjes oplopend</option>
                                <option value="blokjes_aflopend" <?= $sort == 'blokjes_aflopend' ? 'selected' : ''; ?>>Aantal blokjes aflopend</option>
                                <option value="leeftijd_oplopend" <?= $sort == 'leeftijd_oplopend' ? 'selected' : ''; ?>>Leeftijd oplopend</option>
                                <option value="leeftijd_aflopend" <?= $sort == 'leeftijd_aflopend' ? 'selected' : ''; ?>>Leeftijd aflopend</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <?php foreach ($sets as $set) { ?>
                    <div class="col-md-4 mb-4">
                        <a href="detail.php?id=<?= $set->id; ?>" class="text-decoration-none text-dark">
                            <div class="card">
                                <img src="images/sets/<?= $set->image; ?>" class="card-img-top" alt="<?= $set->naam; ?>" style="height: 180px; object-fit: contain;">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $set->naam; ?></h5>
                                    <p class="card-text text-muted"><?= $set->stukjes; ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
            <div class="pagination">
                <a href="#">&laquo;</a>
                <a class="active" href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">6</a>
                <a href="#">&raquo;</a>
            </div>
        </div>
    </body>