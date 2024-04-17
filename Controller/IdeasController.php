<?php
require_once __DIR__ . './../Helpers/FileStorageHelper.php';
require_once __DIR__ . './../Models/Idea.php';
require_once __DIR__ . './../Helpers/SessionManager.php';

class IdeasController{
    public $total_pages; 

    public function index($page, $filter){
        $idea = new Idea();

        // paginate($table, $currentPage, $recordsPerPage)
        
        $totalRecords = count($idea->get('Idea'));
        $this->total_pages = ceil($totalRecords / 5);

        return $idea->paginatedIdeas($page, 5, $filter);
    }

    public function show($id){
        $idea = new Idea();

        return $idea->singleIdea($id);
    }

    public function store($columns, $data, $category_id){
        $idea = new Idea();

        try{
            $idea->store("Idea", $columns, $data);

            $stored_idea = $idea->lastInsertData('Idea', 'idea_id');

            // Storing the category
            $idea->store("Idea_Categories", ["idea_id", "category_id"], [$stored_idea['idea_id'], $category_id]);

            header("Location: /ideas"); 
        }catch(Exception $e){
            return $e;
        }
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $idea = new IdeasController;

    $columns = [
        "title", 
        "description", 
        "date",
        "supporting_document", 
        "anonymous",
        "staff_id"
    ]; // Assuming these are your columns

    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = date('Y-m-d H:i:s');
    $supporting_document = isset($_FILES["supporting_document"]) && $_FILES["supporting_document"]["error"] == UPLOAD_ERR_OK ? FileStorageHelper::saveFile("supporting_document") : null;
    $anonymous = isset($_POST['anonymous']) && $_POST['anonymous'] == 1 ? true : false;

    $session = new SessionManager;
    $data = [
        $title,
        $description,
        $date,
        $supporting_document,
        $anonymous,
        $session->get('staff_id')
    ];

    $idea->store($columns, $data, $_POST['category_id']);
}