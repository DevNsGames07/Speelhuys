<?php
include "./Classes/database.php";
include "./Classes/sets.php";
include "./classes/theme.php";
include "./classes/merk.php";
 
$themeId = $_GET['thema'] ?? null;
$brandId = $_GET['merk'] ?? null;
$themas = Theme::vindtalleThemes();   
$merken = Merk::vindtAlleMerken();
 
$sort = $_GET['sort'] ?? null;
$themeId = $_GET['thema'] ?? null;
$brandId = $_GET['merk'] ?? null;
$page = (int)($_GET['page'] ?? 1);
 
$perPage = 9;
$startAt = $perPage * ($page - 1);
 
$totalSets = Sets::AantalSetsGefilterd($themeId, $brandId);
$totalPages = ceil($totalSets / $perPage);

if (!empty($sort)) {
    $sets = Sets::AlleSetsGesoorteerdEnGefilterd($sort, $startAt, $perPage, $themeId, $brandId);
} else {
    $sets = Sets::AlleSetsGefilterd($startAt, $perPage, $themeId, $brandId);
}



?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Speelhuys</title>
    <link rel="stylesheet" href="style.css">
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
    <nav class="navbar navbar-expand-lg nav-bar" data-bs-theme="light">
        <div class="container-fluid">
            <span class="navbar-brand">Speelhuys </br> codeblokken</span>
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
            <div class="col-md-7 ms-auto">
                <form method="GET" action="" class="d-flex gap-2">
                    <select class="form-select shadow-sm" name="sort" onchange="this.form.submit()">
                        <option value="" <?= empty($sort) ? 'selected' : ''; ?> disabled>Sorteren op...</option>
                        <option value="prijs_oplopend" <?= $sort == 'prijs_oplopend'    ? 'selected' : ''; ?>>Prijs oplopend</option>
                        <option value="prijs_aflopend" <?= $sort == 'prijs_aflopend'    ? 'selected' : ''; ?>>Prijs aflopend</option>
                        <option value="blokjes_oplopend" <?= $sort == 'blokjes_oplopend'  ? 'selected' : ''; ?>>Aantal blokjes oplopend</option>
                        <option value="blokjes_aflopend" <?= $sort == 'blokjes_aflopend'  ? 'selected' : ''; ?>>Aantal blokjes aflopend</option>
                        <option value="leeftijd_oplopend" <?= $sort == 'leeftijd_oplopend' ? 'selected' : ''; ?>>Leeftijd oplopend</option>
                        <option value="leeftijd_aflopend" <?= $sort == 'leeftijd_aflopend' ? 'selected' : ''; ?>>Leeftijd aflopend</option>
                    </select>

                    <select class="form-select shadow-sm" name="thema" onchange="this.form.submit()">
                        <option value="">Alle thema's</option>
                        <?php foreach ($themas as $t) { ?>
                            <option value="<?= $t->id; ?>" <?= ($themeId == $t->id) ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($t->naam); ?>
                            </option>
                        <?php } ?>
                    </select>

                    <select class="form-select shadow-sm" name="merk" onchange="this.form.submit()">
                        <option value="">Alle merken</option>
                        <?php foreach ($merken as $m) { ?>
                            <option value="<?= $m->id; ?>" <?= ($brandId == $m->id) ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($m->naam); ?>
                            </option>
                        <?php } ?>
                    </select>
                </form>
            </div>
        </div>
        <div class="row">
            <?php foreach ($sets as $set) { ?>
                <div class="col-md-4 mb-4">
                    <a href="detail.php?id=<?= $set->id; ?>" class="text-decoration-none text-dark">
                        <div class="card">
                            <img src="images/sets/<?= $set->image; ?>" class="card-img-top set-image" alt="<?= $set->naam; ?>">
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
            <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                <a class="<?= ($i === $page) ? 'active' : ''; ?>"
                    href="?page=<?= $i; ?>&sort=<?= urlencode($sort ?? ''); ?>&thema=<?= urlencode($themeId ?? ''); ?>&merk=<?= urlencode($brandId ?? ''); ?>">
                    <?= $i; ?>
                </a>
            <?php } ?>
        </div>
    </div>
</body>

</html>