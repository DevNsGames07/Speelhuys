<?php
class Gebruiker
{
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $username;
    public $password;
    public $role;

    public static function vindtGebruiker($username, $password)
    {
        $gebruiker = null;

        $conn = Database::start();
    
        $username = mysqli_escape_string($conn, $username);
        $password = mysqli_escape_string($conn, $password);
        $query = "SELECT * FROM users WHERE user_username = '" . $username . "' AND user_password = '" . $password . "'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            $gebruiker = new Gebruiker;
            $gebruiker->id = $row["user_id"];
            $gebruiker->firstname = $row["user_firstname"];
            $gebruiker->lastname = $row["user_lasname"];
            $gebruiker->email = $row["user_email"];
            $gebruiker->username = $row["user_username"];
            $gebruiker->password = $row["user_password"];
            $gebruiker->role = $row["user_role"];
        }
        $conn->close();
        return $gebruiker;
    }

    public static function GebruikerByID($id)
    {
        $gebruiker = null;

        $conn = Database::start();
        $id = mysqli_escape_string($conn, $id);

        $query = "SELECT * FROM users WHERE user_id = '" . $id . "'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            $gebruiker = new Gebruiker;
            $gebruiker->id = $row["user_id"];
            $gebruiker->firstname = $row["user_firstname"];
            $gebruiker->lastname = $row["user_lasname"];
            $gebruiker->email = $row["user_email"];
            $gebruiker->username = $row["user_username"];
            $gebruiker->password = $row["user_password"];
            $gebruiker->role = $row["user_role"];
        }
        $conn->close();
        return $gebruiker;
    }
}

?>