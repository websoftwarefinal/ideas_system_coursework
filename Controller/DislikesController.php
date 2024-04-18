<?php
require_once __DIR__ . './../Models/Dislike.php';
require_once __DIR__ . './../Models/Like.php';
require_once __DIR__ . './../Helpers/SessionManager.php';

class DislikesController{
    public function store($columns, $data, $idea_id, $author_id){
        $dislike = new Dislike;

        $dislike->store("Dislikes", $columns, $data);

        $this->deleteExistingLike($author_id, $idea_id);

        header("Location: /idea-details?idea_id=$idea_id"); 
    }

    public function deleteDislike($idea_id, $author_id){
        $dislike = new Dislike;
        $dislike->deleteDislike($idea_id, $author_id);

        header("Location: /idea-details?idea_id=$idea_id"); 
    }

    private function deleteExistingLike($author_id, $idea_id){
        $like = new Like;
        $found_like = $like->findLike($author_id, $idea_id);

        if(isset($found_like['idea_id'])){
            $like->deleteLike($idea_id, $author_id);
        }
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $session = new SessionManager;
    $author_id = $session->get('staff_id');

    $columns = [
        "idea_id",
        "author_id"
    ];

    $idea_id = $_POST['idea_id'];

    $data = [
        $idea_id,
        $author_id
    ];

    // findDislike($staff_id, $idea_id)
    $dislike = new Dislike;
    $found_dislike = $dislike->findDislike($author_id, $idea_id);

    $dislikes = new DislikesController;

    if(!isset($found_dislike['idea_id']) && !isset($found_dislike['author_id'])){
        $dislikes->store($columns, $data, $idea_id, $author_id);
    }else{
        $dislike_id = $found_dislike['idea_id'];
        $dislikes->deleteDislike($idea_id, $author_id);
    }
}