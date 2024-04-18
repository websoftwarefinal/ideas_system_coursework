<?php
require_once __DIR__ . '/Model.php';

class Comment extends Model{
    public function ideaComments($idea_id){
        $sql = "SELECT Comments.*, Staff.first_name AS first_name, Staff.last_name AS last_name
            FROM Comments
            JOIN Staff ON Comments.author_id = Staff.staff_id
            WHERE Comments.idea_id = :idea_id
            ORDER BY Comments.date ASC";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':idea_id', $idea_id, PDO::PARAM_INT);
            // Execute the SQL query
            $stmt->execute();
            // Fetch the result
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
    }
}