<?php

class DatabaseConnection{

    public static $instance = null;
    private PDO $pdo;

    private function __construct()
    {
        $username = "postgres";
        $dbname = "freelanceedgedb";
        $host = "localhost";
        $password = "4321";
        $port = 5432;

        $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

        try{

            $this -> pdo = new PDO($dsn, $username, $password);

        }catch(PDOException $e){
            echo "Error" . $e -> getMessage();
        }

    }

    public static function getInstance():PDO{
        if (self::$instance === null) {
           self::$instance = new self();
        }
        return self::$instance->pdo;
    }

}

















