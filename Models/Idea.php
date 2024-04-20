<?php
require_once __DIR__ . '/Model.php';

class Idea extends Model{
    public function paginatedIdeas($currentPage, $recordsPerPage, $filter){
        // Calculate the offset for the SQL query
        $offset = ($currentPage - 1) * $recordsPerPage;

        $query = 'WHERE Staff.posts_banned = 0 ORDER BY date DESC';

        if($filter == 'oldest'){
            $query = 'WHERE Staff.posts_banned = 0 ORDER BY date ASC';
        }else if($filter == 'most-popular'){
            $query = 'WHERE Staff.posts_banned = 0 ORDER BY popularity DESC';
        }

        // Fetch records from the database
        $sql = "SELECT Idea.*, Staff.first_name AS first_name, Staff.last_name AS last_name, Categories.category_name AS category_name
        FROM Idea
        JOIN Staff ON Idea.staff_id = Staff.staff_id
        JOIN Idea_Categories ON Idea.idea_id = Idea_Categories.idea_id
        JOIN Categories ON Idea_Categories.category_id = Categories.category_id
        $query
        LIMIT :offset, :recordsPerPage";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':recordsPerPage', $recordsPerPage, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function singleIdea($idea_id){
        $sql = "SELECT Idea.*, Staff.first_name AS first_name, Staff.last_name AS last_name, Categories.category_name AS category_name
        FROM Idea
        JOIN Staff ON Idea.staff_id = Staff.staff_id
        JOIN Idea_Categories ON Idea.idea_id = Idea_Categories.idea_id
        JOIN Categories ON Idea_Categories.category_id = Categories.category_id
        WHERE Idea.idea_id = :idea_id";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':idea_id', $idea_id, PDO::PARAM_INT);

            // Execute the SQL query
            $stmt->execute();
            // Fetch the result
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function anonymousIdeas(){
        try {
            $sql = "SELECT COUNT(*) AS row_count FROM Idea WHERE anonymous = ?";
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