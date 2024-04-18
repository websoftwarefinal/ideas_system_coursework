<?php
require_once __DIR__ . '/Model.php';

class Like extends Model{
    public function findLike($author_id, $idea_id){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM Likes WHERE author_id = ? AND idea_id = ?");
            $stmt->execute([$author_id, $idea_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Find Ideas Query failed: " . $e->getMessage();
        }
    }

    public function deleteLike($idea_id, $author_id){
        try {
            $sql = "DELETE FROM Likes WHERE idea_id = ? AND author_id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$idea_id, $author_id]);
            return true;
        } catch (PDOException $e) {
            echo "Delete Like Query failed: " . $e->getMessage();
        }
    }
}