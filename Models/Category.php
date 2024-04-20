<?php
require_once __DIR__ . '/Model.php';

class Category extends Model{
    // In this class you can write all the custom methods that do not exist in the Parent Model


    public function createCategories(){
        $categories = $this->get('Categories');

        if(count($categories) == 0){
            $columns = [
                "category_name", 
            ]; // Assuming these are your columns
        
            $data = [
                ["Creative ideas"],
                ["Philosophical ideas"],
                ["Social ideas"],
                ["Technological ideas"],
                ["Personal ideas"]
            ];

            foreach($data as $dt){
                $this->store("Categories", $columns, $dt);
            }
        }
    }

    public function categoryIdeasCount($category_id){
        try {
            $sql = "SELECT COUNT(*) AS row_count FROM Idea_Categories WHERE category_id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$category_id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $row_count = $result['row_count'];
            return $row_count;
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
    }
}