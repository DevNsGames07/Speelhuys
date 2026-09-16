<?php

include "../Classes/database.php";
include "../Classes/sets.php";

$id = $_GET["id"];

$set = Sets::find($id);

if (isset($_POST["verwijderen"])) {

    $conn = Database::start();

    $sql = "DELETE FROM sets WHERE set_id = '$id'";

    $conn->query($sql);

    $conn->close();

    header("Location: sets.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Set verwijderen</title>

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

        <a href="overzichtadmin.php">
            Overzicht
        </a>

        <a href="thema.php">
            Thema
        </a>

        <a href="merk.php">
            Merk
        </a>

        <a href="sets.php" class="active">
            Sets
        </a>

    </aside>


    <main class="content">

        <div class="container-header">

            <h1>Set verwijderen</h1>

        </div>


        <div class="product-card">

            <div class="product-info">

                <h2>
                    <?= $set->naam ?>
                </h2>

                <p>
                    Weet je zeker dat je deze set wilt verwijderen?
                </p>


                <form method="POST">

                    <button
                        type="submit"
                        name="verwijderen"
                    >
                        Ja, verwijderen
                    </button>


                    <a
                        href="detail.php?id=<?= $set->id ?>"
                        class="detail-button"
                    >
                        Nee, terug
                    </a>

                </form>

            </div>

        </div>

    </main>

</div>


<footer class="site-footer">

    <h2>Speelhuys</h2>

</footer>

</body>

</html>