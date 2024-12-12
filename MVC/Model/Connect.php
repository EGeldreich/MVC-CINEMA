<?php
namespace Model;

abstract class Connect {
    // const HOST = "localhost"; // Port par défaut de MAMP
    // const DB = "cinema_emmanuel";
    // const USER = "root";
    // const PASS = "";
    const HOST = "localhost:8889"; // Port par défaut de MAMP
    const DB = "cinemadb";
    const USER = "root";
    const PASS = "root";

    public static function seConnecter() {
        try {
            $pdo = new \PDO(
                'mysql:host='.self::HOST.';dbname='.self::DB.';charset=utf8',
                self::USER,
                self::PASS
            );
            return $pdo;
        } catch (\PDOException $ex) {
            // Lever une exception en cas d'erreur
            die("Erreur de connexion à la base de données : " . $ex->getMessage());
        }
    }
}