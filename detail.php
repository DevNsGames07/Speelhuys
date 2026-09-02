// Backend

<?php
include "./Classes/database.php";
include "./Classes/sets.php";
$set = Sets::find($_GET["id"]);
if ($set == null) {
    header("Location: index.php");
    exit;
}
?>
<p> <?= $set->naam ?></p>
// Overige container van de item van het id.
