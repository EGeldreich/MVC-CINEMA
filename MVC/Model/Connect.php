<?php
namespace Model;

abstract class Connect {
    const HOST = "localhost"; // to use with HeidiSQL
    const DB = "cinema_emmanuel";
    const USER = "root";
    const PASS = "";
    // const HOST = "localhost:8889"; // to use with MAMP
    // const DB = "cinemadb";
    // const USER = "root";
    // const PASS = "root";

    public static function seConnecter() {
        try {
            $pdo = new \PDO(
                'mysql:host='.self::HOST.';dbname='.self::DB.';charset=utf8',
                self::USER,
                self::PASS
            );
            return $pdo;
        } catch (\PDOException $ex) {
            // catch exception error
            die("Erreur de connexion à la base de données : " . $ex->getMessage());
        }
    }
}
