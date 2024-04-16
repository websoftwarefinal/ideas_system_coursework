<?php
require_once __DIR__ . '/Model.php';

class Idea extends Model{
    public function paginate($table, $currentPage, $recordsPerPage, $filter){
        // Calculate the offset for the SQL query
        $offset = ($currentPage - 1) * $recordsPerPage;

        $query = 'ORDER BY date DESC';

        if($filter == 'oldest'){
            $query = 'ORDER BY date ASC';
        }

        // Fetch records from the database
        $query = "SELECT * FROM $table $query LIMIT :offset, :recordsPerPage";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':recordsPerPage', $recordsPerPage, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}