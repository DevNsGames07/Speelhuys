<?php
class Merk
{
    public $id;
    public $naam;
    public $logo;


    public static function VindtalleMerken()
    {
        $conn = Database::start(); // Start database.
        $sql = "SELECT * FROM brands"; // Opdracht
        $result = $conn->query($sql); // Voert opdracht uit.
        $merken = []; // Maakt een lege lijst.

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $merk = new Merk();
                $merk->id = $row["brand_id"];
                $merk->naam = $row["brand_name"];
                $merk->logo = $row["brand_logo"];
                $merken[] = $merk; // Voegt object toe aan de lijst.
            }
        }
        $conn->close();
        return $merken;
    }

    public static function VindtThemeByID($id)
    {
        $merk = null;
        $conn = Database::start(); // Start database.
        $sql = "SELECT * FROM brands WHERE brand_id = '" . $id . "'"; // Opdracht
        $result = $conn->query($sql); // Voert opdracht uit.

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $merk = new Merk();
            $merk->id = $row["brand_id"];
            $merk->naam = $row["brand_name"];
            $merk->logo = $row["brand_logo"];
        }
        $conn->close();
        return $merk;
    }
}
