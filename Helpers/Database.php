<?php
require_once __DIR__ . '/DotEnv.php';

class Database{
    protected $pdo;
    private $table;

    public function __construct($table){  
        $this->table = $table;

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

    public function get(){
        try {
            $query = "SELECT * FROM $this->table";

            $stmt = $this->pdo->query($query);

            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
    }

    public function select($columns){
        try {
            if(count($columns) > 0){
                $cols = implode(', ', $columns);

                $query = "SELECT $cols FROM $this->table";
                $stmt = $this->pdo->query($query);
                return $stmt->fetchAll();
            }
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
    }
}