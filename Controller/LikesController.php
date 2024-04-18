<?php
require_once __DIR__ . './../Models/Like.php';
require_once __DIR__ . './../Models/Dislike.php';
require_once __DIR__ . './../Helpers/SessionManager.php';

class LikesController{
    public function store($columns, $data, $idea_id, $author_id){
        $like = new Like;

        $like->store("Likes", $columns, $data);

        $this->deleteExistingDislike($author_id, $idea_id);

        header("Location: /idea-details?idea_id=$idea_id"); 
    }

    public function deleteLike($idea_id, $author_id){
        $like = new Like;
        $like->deleteLike($idea_id, $author_id);

        header("Location: /idea-details?idea_id=$idea_id"); 
    }

    private function deleteExistingDislike($author_id, $idea_id){
        $dislike = new Dislike;
        $found_like = $dislike->findDislike($author_id, $idea_id);

        if(isset($found_like['idea_id'])){
            $dislike->deleteDislike($idea_id, $author_id);
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

    // findLike($staff_id, $idea_id)
    $like = new Like;
    $found_like = $like->findLike($author_id, $idea_id);

    $likes = new LikesController;

    if(!isset($found_like['idea_id']) && !isset($found_like['author_id'])){
        $likes->store($columns, $data, $idea_id, $author_id);
    }else{
        $like_id = $found_like['idea_id'];
        $likes->deleteLike($idea_id, $author_id);
    }
}