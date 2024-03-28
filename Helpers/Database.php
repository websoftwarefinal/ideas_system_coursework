<?php
class Database{
    protected $pdo;
    private $table;

    public function __construct($table){  
        $this->table = $table;

        $host = 'localhost';
        $dbName = 'ses';
        $username = 'root';
        $password = '';

        $dsn = "mysql:host=$host;dbname=$dbName";

        try {
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