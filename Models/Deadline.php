<?php
require_once __DIR__ . '/Model.php';

class Deadline extends Model{
    public function createDeadline(){
        $deadlines = $this->get('Deadline');

        if(count($deadlines) == 0){
            $columns = [
                "deadline_date"
            ]; // Assuming these are your columns
        
            $data = ['2024-08-01'];

            $this->store("Deadline", $columns, $data);
        }
    }

    public function getCurrentDeadline(){
        return $this->lastInsertData('Deadline', 'deadline_id');
    }
}