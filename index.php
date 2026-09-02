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

        </div>
    </body>