<?php
class Database
{
    public static function start()
    {
        $dbServerName = "127.0.0.1";
        $dbUsername = "root";
        $dbPassword = "mysql";
        $dbDatabase = "speelhuys";

        $conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbDatabase);

        if ($conn->connect_error) {
            die("Connectie mislukt: " . $conn->connect_error);
        }

        return $conn;
    }
}
?>