<?php
require_once __DIR__ . './../Models/Report.php';
require_once __DIR__ . './../Helpers/SessionManager.php';

class ReportsController{
    public function store($idea_id){
        $report = new Report;

        $session = new SessionManager;
        $staff_id = $session->get('staff_id');

        $report->store('report_idea', ["idea_id", "staff_id"], [$idea_id, $staff_id]);

        header("Location: /idea-details?idea_id=$idea_id"); 
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $report = new ReportsController;
    $idea_id = $_POST['idea_id'];

    $report->store($idea_id);
}