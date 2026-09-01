<?php
class Theme
{
    public $id;
    public $naam;

    public static function VindtalleThemes()
    {
        $conn = Database::start(); // Start database.
        $sql = "SELECT * FROM themes"; // Opdracht
        $result = $conn->query($sql); // Voert opdracht uit.
        $themes = []; // Maakt een lege lijst.

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $theme = new Theme();
                $theme->id = $row["theme_id"];
                $theme->naam = $row["theme_name"];
                $themes[] = $theme; // Voegt object toe aan de lijst.
            }
        }
        $conn->close();
        return $themes;
    }

    public static function VindtThemeByID($id)
    {
        $theme = null;
        $conn = Database::start(); // Start database.
        $sql = "SELECT * FROM themes WHERE theme_id = '" . $id . "'"; // Opdracht
        $result = $conn->query($sql); // Voert opdracht uit.

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $theme = new Theme();
            $theme->id = $row["theme_id"];
            $theme->naam = $row["theme_name"];
        }
        $conn->close();
        return $theme;
    }
}
