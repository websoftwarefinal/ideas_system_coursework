<?php
require_once __DIR__ . './../Helpers/Database.php';

// Modal Class
class Model extends Database {
    // Method to create record
    public function store($table, $columns, $data) {
        try {
            $columnNames = implode(", ", $columns);
            $placeholders = rtrim(str_repeat("?, ", count($columns)), ", ");
            $sql = "INSERT INTO $table ($columnNames) VALUES ($placeholders)";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($data);
            return $stmt;
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
    }

    // Method to update record
    public function update($table, $id, $columns, $data, $id_name) {
        try {
            $setStatements = "";
            foreach ($columns as $column) {
                $setStatements .= "$column = ?, ";
            }
            $setStatements = rtrim($setStatements, ", ");
            $sql = "UPDATE $table SET $setStatements WHERE $id_name = ?";
            $params = array_merge($data, [$id]);
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute($params);
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
    }

    // Method to delete record
    public function delete($table, $id, $id_name) {
        try {
            $sql = "DELETE FROM $table WHERE $id_name = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            return true;
            return $this->pdo->executeQuery($sql, $params);
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
    }

    // Method to get record
    public function find($table, $id, $id_name) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE $id_name = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
    }

    public function get($table){
        try {
            $query = "SELECT * FROM $table";

            $stmt = $this->pdo->query($query);

            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
    }

    public function select($table, $columns){
        try {
            if(count($columns) > 0){
                $cols = implode(', ', $columns);

                $query = "SELECT $cols FROM $table";
                $stmt = $this->pdo->query($query);
                return $stmt->fetchAll();
            }
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
    }

    public function lastInsertData($table, $primary_key){
        // Getting the data that's just been submitted
        $query = $this->pdo->query("SELECT * FROM $table ORDER BY $primary_key DESC LIMIT 1");
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function count($table, $id, $id_name){
        try {
            $sql = "SELECT COUNT(*) AS row_count FROM $table WHERE $id_name = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $row_count = $result['row_count'];
            return $row_count;
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
    }

    public function ideaFilesArray(){
        $sql = "SELECT *
            FROM Idea
            WHERE supporting_document IS NOT NULL";

            try {
                $stmt = $this->pdo->prepare($sql);
                // Execute the SQL query
                $stmt->execute();
                // Fetch the result
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Query failed: " . $e->getMessage();
            }
    }
}