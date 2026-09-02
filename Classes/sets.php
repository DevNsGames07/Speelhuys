<?php
class Sets
{
    public $id;
    public $naam;
    public $beschrijving;
    public $merkid;
    public $themeid;
    public $image;
    public $price;
    public $age;
    public $stukjes;
    public $vooraad;


    public static function AlleSets()
    {
        $conn = Database::start(); // Start database.
        $sql = "SELECT * FROM sets"; // Opdracht
        $result = $conn->query($sql); // Voert opdracht uit.
        $sets = []; // Maakt een lege lijst.

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $set = new Sets();
                $set->id = $row["set_id"];
                $set->naam = $row["set_name"];
                $set->beschrijving = $row["set_description"];
                $set->merkid = $row["set_brand_id"];
                $set->themeid = $row["set_theme_id"];
                $set->image = $row["set_image"];
                $set->price = $row["set_price"];
                $set->age = $row["set_age"];
                $set->stukjes = $row["set_pieces"];
                $set->vooraad = $row["set_stock"];
                $sets[] = $set;
            }
        }
        $conn->close();
        return $sets;
    }

    public static function find($id)
    {
        $set = null;
        $conn = Database::start();
        $id = mysqli_escape_string($conn, $id);
        $sql = "SELECT * FROM sets WHERE set_id ='" . $id . "' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $set = new Sets();
            $set->id = $row["set_id"];
            $set->naam = $row["set_name"];
            $set->beschrijving = $row["set_description"];
            $set->merkid = $row["set_brand_id"];
            $set->themeid = $row["set_theme_id"];
            $set->image = $row["set_image"];
            $set->price = $row["set_price"];
            $set->age = $row["set_age"];
            $set->stukjes = $row["set_pieces"];
            $set->vooraad = $row["set_stock"];
        }
        $conn->close();
        return $set;
    }

    
}
