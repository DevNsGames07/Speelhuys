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


    public static function AlleSets($startAt, $perPage)
    {
        $conn = Database::start(); // Start database.
        $sql = "SELECT * FROM sets LIMIT $startAt, $perPage";
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

    public static function AlleSetsGesoorteerd($sort, $startAt, $perPage)
    {
        $conn = Database::start(); // Start database.
        $sql = "SELECT * FROM sets"; // Basis opdracht


        if ($sort == 'prijs_oplopend') {
            $sql .= " ORDER BY set_price ASC";
        } elseif ($sort == 'prijs_aflopend') {
            $sql .= " ORDER BY set_price DESC";
        } elseif ($sort == 'blokjes_oplopend') {
            $sql .= " ORDER BY set_pieces ASC ";
        } elseif ($sort == 'blokjes_aflopend') {
            $sql .= " ORDER BY set_pieces DESC";
        } elseif ($sort == 'leeftijd_oplopend') {
            $sql .= " ORDER BY set_age ASC ";
        } elseif ($sort == 'leeftijd_aflopend') {
            $sql .= " ORDER BY set_age DESC ";
        }

        $sql .= " LIMIT " . $startAt . "," . $perPage . "";

        $result = $conn->query($sql);

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
        $sql = "SELECT * FROM sets WHERE set_id = '" . $id . "' ";
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

    public static function AantalSets()
    {
        $conn = Database::start();
        $result = $conn->query("SELECT COUNT(*) FROM sets");
        
        $count = $result->fetch_row()[0]; 
        
        return (int)$count;
    }
    
    public static function AlleSetsGefilterd($startAt, $perPage, $themeId = null, $brandId = null)
    {
        $conn = Database::start();

        $where = [];
        $types = '';
        $params = [];

        if (!empty($themeId)) {
            $where[] = "set_theme_id = ?";
            $types .= 'i';
            $params[] = $themeId;
        }
        if (!empty($brandId)) {
            $where[] = "set_brand_id = ?";
            $types .= 'i';
            $params[] = $brandId;
        }

        $sql = "SELECT * FROM sets";
        if ($where) {
            $sql .= " WHERE " . implode(' AND ', $where);
        }
        $sql .= " LIMIT ?, ?";
        $types .= 'ii';
        $params[] = $startAt;
        $params[] = $perPage;

        $stmt = $conn->prepare($sql);
        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        $result = $stmt->get_result();

        $sets = [];
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
        $stmt->close();
        $conn->close();
        return $sets;
    }

    public static function AlleSetsGesoorteerdEnGefilterd($sort, $startAt, $perPage, $themeId = null, $brandId = null)
    {
        $conn = Database::start();

        $where = [];
        $types = '';
        $params = [];

        if (!empty($themeId)) {
            $where[] = "set_theme_id = ?";
            $types .= 'i';
            $params[] = $themeId;
        }
        if (!empty($brandId)) {
            $where[] = "set_brand_id = ?";
            $types .= 'i';
            $params[] = $brandId;
        }

        $sql = "SELECT * FROM sets";
        if ($where) {
            $sql .= " WHERE " . implode(' AND ', $where);
        }

        if ($sort == 'prijs_oplopend') {
            $sql .= " ORDER BY set_price ASC";
        } elseif ($sort == 'prijs_aflopend') {
            $sql .= " ORDER BY set_price DESC";
        } elseif ($sort == 'blokjes_oplopend') {
            $sql .= " ORDER BY set_pieces ASC";
        } elseif ($sort == 'blokjes_aflopend') {
            $sql .= " ORDER BY set_pieces DESC";
        } elseif ($sort == 'leeftijd_oplopend') {
            $sql .= " ORDER BY set_age ASC";
        } elseif ($sort == 'leeftijd_aflopend') {
            $sql .= " ORDER BY set_age DESC";
        }

        $sql .= " LIMIT ?, ?";
        $types .= 'ii';
        $params[] = $startAt;
        $params[] = $perPage;

        $stmt = $conn->prepare($sql);
        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        $result = $stmt->get_result();

        $sets = [];
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
        $stmt->close();
        $conn->close();
        return $sets;
    }

    public static function AantalSetsGefilterd($themeId = null, $brandId = null)
    {
        $conn = Database::start();

        $where = [];
        $types = '';
        $params = [];

        if (!empty($themeId)) {
            $where[] = "set_theme_id = ?";
            $types .= 'i';
            $params[] = $themeId;
        }
        if (!empty($brandId)) {
            $where[] = "set_brand_id = ?";
            $types .= 'i';
            $params[] = $brandId;
        }

        $sql = "SELECT COUNT(*) FROM sets";
        if ($where) {
            $sql .= " WHERE " . implode(' AND ', $where);
        }

        $stmt = $conn->prepare($sql);
        if ($params) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $count = $result->fetch_row()[0];

        $stmt->close();
        $conn->close();
        return (int)$count;
    }
    public static function ToevoegenSet($naam, $beschrijving, $merkid, $themeId, $image, $price, $age, $stukjes, $vooraad)
    {
        $conn = Database::start();
        $sql = "INSERT INTO sets
        (set_name, set_description, set_brand_id, set_theme_id, set_image, set_price, set_age, set_pieces, set_stock)   
        VALUES ('$naam', '$beschrijving', '$merkid', '$themeId', '$image', '$price', '$age', '$stukjes', '$vooraad')";
        
        $conn->query($sql);
        $conn->close();
    }


    public function Delete()
    {
        $conn = Database::start();

        $id = mysqli_escape_string($conn, $this->id);
        $sql = "
            DELETE FROM 
                sets 
            WHERE set_id = " . $id . "
        ";
        $conn->query($sql);
        $conn->close();
    }

}
