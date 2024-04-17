<?php
require_once __DIR__ . './Model.php';

class Department extends Model{
    // In this class you can write all the custom methods that do not exist in the Parent Model


    public function createDepartment(){
        $departments = $this->get('Department');

        $roles = $this->get('Roles');

        if(count($departments) == 0 && count($roles) > 0){
            $role_id = $roles[0]['role_id'];

            $columns = [
                "department_name", 
            ]; // Assuming these are your columns
        
            $data = [
                ["Department of information Technology"],
                ["Department of computer engineering"],
                ["Department of computer science "],
                ["Department of business and management sciences"]
            ];

            foreach($data as $dt){
                $this->store("Department", $columns, $dt);
            }
        }
    }
}