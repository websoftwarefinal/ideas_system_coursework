<?php 
require_once __DIR__ . './../Models/Comment.php';
require_once __DIR__ . './../Helpers/SessionManager.php';

class CommentsController{
    public function index(){
        $comment = new Comment();

        return $comment->get('Comments');
    }

    public function store($columns, $data, $idea_id){
        $comment = new Comment();

        try{
            $comment->store("Comments", $columns, $data);

            header("Location: /idea-details?idea_id=$idea_id");
        }catch(Exception $e){
            return $e;
        }
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $columns = [
        "author_id",
        "idea_id",
        "date",
        "text"
    ];

    $session = new SessionManager;

    $staff_id = $session->get('staff_id');
    $idea_id = $_POST['idea_id'];
    $date = date('Y-m-d');
    $text = $_POST['comment'];

    $data = [
        $staff_id,
        $idea_id,
        $date,
        $text
    ];

    $comment = new CommentsController;

    $comment->store($columns, $data, $idea_id);
}