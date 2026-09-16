<?php
{
    include "../Classes/database.php";
    include "../Classes/gebruiker.php";
    include "../Classes/sets.php";

    $sets = Sets::find($_GET["id"]); // Haalt set op via id
    $gebruiker = Gebruiker::GebruikerByID($_COOKIE["gebruiker-id"]);

    if (isset($_COOKIE["gebruiker-id"]) == null) {
        header("location: overzichtadmin.php?Je bent niet ingelogd!");
        exit;
    }

    if ($sets != null) {
        if ($gebruiker->role == "admin") {
            $sets->Delete();
            header("Location: overzichtadmin.php?message=Set is verwijderd");
            exit;      
        } else {
            header("Location: overzichtadmin.php?message=Je bent geen admin.");
            exit;
        }
    } else {
        header("Location: overzichtadmin.php");
        exit;
    }
}
?>