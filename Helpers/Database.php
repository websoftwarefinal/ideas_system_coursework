<?php
require_once __DIR__ . '/DotEnv.php';

class Database{
    protected $pdo;

    public function __construct(){  
        try {
            // Getting data database details from the .env file
            $dotenv = new DotEnv(__DIR__ . '/../.env');
            $dotenv->load();

            $host = getenv('DB_HOST');
            $dbName = getenv('DB_NAME');
            $username = getenv('DB_USERNAME');
            $password = getenv('DB_PASSWORD');

            // Establishing a connection with the database.
            $dsn = "mysql:host=$host;dbname=$dbName";
            
            $this->pdo = new PDO($dsn, $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}