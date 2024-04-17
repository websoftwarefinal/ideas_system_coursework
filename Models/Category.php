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
}