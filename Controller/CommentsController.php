<?php 
require_once __DIR__ . './../Models/Comment.php';
require_once __DIR__ . './../Helpers/SessionManager.php';
require_once __DIR__ . './../Helpers/SendEmail.php';

class CommentsController{
    public function index($idea_id){
        $comment = new Comment();

        return $comment->ideaComments($idea_id);
    }

    public function store($columns, $data, $idea_id){
        $comment = new Comment();

        $session = new SessionManager;

        try{
            $comment->store("Comments", $columns, $data);

            $email = new SendEmail();

            $poster_email = $this->posterEmail($idea_id);
            
            $email->send('Comment on your idea Idea', 'Your idea has a new comment <br /> <b>Commenter: ' . $session->get('first_name') . ' ' . $session->get('last_name') . ' </b><br />' . $data[3], $poster_email);

            header("Location: /idea-details?idea_id=$idea_id");
        }catch(Exception $e){
            return $e;
        }
    }

    private function posterEmail($idea_id){
        $comment = new Comment();
        $idea = $comment->find('Idea', $idea_id, 'idea_id');

        $staff = $comment->find('Staff', $idea['staff_id'], 'staff_id');

        return $staff['email_address'];
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $columns = [
        "author_id",
        "idea_id",
        "date",
        "text",
        "anonymous"
    ];

    $session = new SessionManager;

    $staff_id = $session->get('staff_id');
    $idea_id = $_POST['idea_id'];
    $date = date('Y-m-d');
    $text = $_POST['comment'];
    $anonymous = isset($_POST['anonymous']) ? $_POST['anonymous'] : null;

    $data = [
        $staff_id,
        $idea_id,
        $date,
        $text,
        $anonymous
    ];

    $comment = new CommentsController;

    $comment->store($columns, $data, $idea_id);
}