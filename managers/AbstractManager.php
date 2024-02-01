<?php

abstract class AbstractManager
{
    protected PDO $db;

    public function __construct()
    {
        $port = '3306';
        $dbName = 'coindineloan_auth_MVC';
        $host = '127.0.0.1';

        $connexionString = "mysql:host=$host;port=$port;dbname=$dbName;charset=utf8";
        $user = 'root';
        $password = '';  // Ajoutez votre mot de passe ici s'il y en a un

        try {
            $this->db = new PDO(
                $connexionString,
                $user,
                $password,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }
}
