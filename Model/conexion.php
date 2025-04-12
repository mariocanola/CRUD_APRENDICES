<?php

class Database {
    public static function connect() {
        $host = 'localhost';
        $dbname = 'crud_aprendices';
        $username = 'root';
        $password = '';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Error en la conexión: " . $e->getMessage());
        }
    }
}