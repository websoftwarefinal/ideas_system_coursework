<?php
require_once __DIR__ . './../Models/Deadline.php';

class DeadlinesController{
    public function store($columns, $data){
        $deadline = new Deadline;
        $deadline->store("Deadline", $columns, $data);

        header("Location: /admin-controls");
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $columns = [
        "deadline_date"
    ];

    $deadline_date = $_POST['deadline_date'];

    $data = [
        $deadline_date
    ];

    $deadline = new DeadlinesController;
    $deadline->store($columns, $data);
}