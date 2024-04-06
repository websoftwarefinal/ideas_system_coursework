<?php
require_once __DIR__ . '/Model.php';

class Department extends Model{
    // In this class you can write all the custom methods that do not exist in the Parent Model


    public function createDepartment(){
        $users = $this->get('Department');

        $roles = $this->get('Roles');

        if(count($users) == 0 && count($roles) > 0){
            $role_id = $roles[0]['role_id'];

            $columns = [
                "department_name", 
                "role_id", 
                "email_address",
                "password"
            ]; // Assuming these are your columns
        
            $data = [
                "Administrators",
                $role_id,
                "admin@admin.com",
                password_hash("12345678", PASSWORD_DEFAULT)
            ];

            $this->store("Department", $columns, $data);
        }
    }
}