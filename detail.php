
<?php
include "./Classes/database.php";
include "./Classes/sets.php";
$set = Sets::find($_GET["id"]);
if ($set == null) {
    header("Location: index.php");
    exit;
}
?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Speelhuys - <?=$set->naam ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
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
        <div class="container text-center">
            <div class="row">
                <div class="col-8">
                <img src="images/sets/<?= $set->image; ?>" alt="<?= $set->naam; ?>" style="height: 300px; object-fit: cover;">
                </div>
                <div class="col-4">
                <p style="fs-1"><b><?= $set->naam ?></b></br></p>
                <p><?= $set->beschrijving ?> </p>
            </div>
        </div>
    </div>
</body>

