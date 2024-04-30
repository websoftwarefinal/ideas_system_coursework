<?php
require_once __DIR__ . '/Model.php';

class Comment extends Model{
    public function ideaComments($idea_id, $filter){
        $orderBy = $filter == 'ORDER BY Comments.comment_id ASC';

        if($filter == 'latest'){
            $orderBy = 'ORDER BY Comments.comment_id DESC';
        }

        $sql = "SELECT Comments.*, Staff.first_name AS first_name, Staff.last_name AS last_name
            FROM Comments
            JOIN Staff ON Comments.author_id = Staff.staff_id
            WHERE Comments.idea_id = :idea_id
            $orderBy";

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

    public function anonymousComments(){
        try {
            $sql = "SELECT COUNT(*) AS row_count FROM Comments WHERE anonymous = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['1']);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $row_count = $result['row_count'];
            return $row_count;
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
    }
}