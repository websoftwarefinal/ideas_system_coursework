<?php
require_once __DIR__ . '/Model.php';

class Dislike extends Model{
    public function findDislike($author_id, $idea_id){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM Dislikes WHERE author_id = ? AND idea_id = ?");
            $stmt->execute([$author_id, $idea_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Find dislike Query failed: " . $e->getMessage();
        }
    }

    public function deleteDislike($idea_id, $author_id){
        try {
            $sql = "DELETE FROM Dislikes WHERE idea_id = ? AND author_id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$idea_id, $author_id]);
            return true;
        } catch (PDOException $e) {
            echo "Delete dislike Query failed: " . $e->getMessage();
        }
    }
}