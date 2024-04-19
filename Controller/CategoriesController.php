<?php
require_once __DIR__ . './../Models/Category.php';

class CategoriesController{
    public function index(){
        $categories = new Category;
        return $categories->get('Categories');
    }

    public function store($columns, $data){
        $category = new Category;
        $category->store('Categories', $columns, $data);

        header('Location: /qa-manager-controls');
    }

    public function delete($id){
        $category = new Category;
        $category->delete('Categories', $id, 'category_id');
        header('Location: /qa-manager-controls');
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['_method']) && $_POST['_method'] == 'delete'){
        $category = new CategoriesController;
        $category_id = $_POST['category_id'];
        $category->delete($category_id);
    }else{
        $category = new CategoriesController;

        $columns = [
            "category_name"
        ];

        $category_name = $_POST['category_name'];
        $data = [
            $category_name
        ];

        $category->store($columns, $data);
    }
}