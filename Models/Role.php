<?php
require_once __DIR__ . '/Model.php';

class Role extends Model{
    // In this class you can write all the custom methods that do not exist in the Parent Model


    public function createRole(){
        $roles = $this->get('Roles');

        if(count($roles) == 0){
            $columns = [
                "role_name"
            ]; // Assuming these are your columns
        
            $data = [
                ["Admin"],
                ["QA Manager"],
                ["QA Cordinator"],
                ["Staff"]
            ];

            foreach($data as $dt){
                $this->store("Roles", $columns, $dt);
            }
        }
    }
}