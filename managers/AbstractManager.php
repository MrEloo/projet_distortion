<?php
abstract class AbstractManager
{
    protected PDO $db;

    public function __construct()
    {
        $host = "db.3wa.io";
        $port = "3306";
        $dbname = "antoinecormier_distorsion";
        $connexionString = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";

        $user = "antoinecormier";
        $password = "52ca4b4148c7bf06f35e89032a52940f";

        $this->db = new PDO(
            $connexionString,
            $user,
            $password
        );
    }
}
