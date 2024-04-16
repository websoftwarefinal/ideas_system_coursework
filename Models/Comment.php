<?php
require_once __DIR__ . '/Model.php';

class Comment extends Model{
    public function ideaComments($idea_id){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM Comments WHERE idea_id = :idea_id");
            $stmt->execute(array(':idea_id' => $idea_id));
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
    }
}