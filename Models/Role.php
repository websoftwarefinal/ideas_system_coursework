<?php
require_once __DIR__ . '/Model.php';

class Role extends Model{
    // In this class you can write all the custom methods that do not exist in the Parent Model


    public function createRole(){
        $users = $this->get('Roles');

        if(count($users) == 0){
            $columns = [
                "role_name"
            ]; // Assuming these are your columns
        
            $data = [
                "QA Cordinator"
            ];

            $this->store("Roles", $columns, $data);
        }
    }
}