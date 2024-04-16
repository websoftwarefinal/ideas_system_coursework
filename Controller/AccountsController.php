<?php
require_once __DIR__ . './../Models/Account.php';

class AccountsController{
    function getAccounts(){
        
    }

    function createAccout($columns, $data){
        $account = new Account();

        try{
            $account->store("Staff", $columns, $data);

            header("Location: /admin-controls"); 
        }catch(Exception $e){
            return $e;
        }
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $account = new AccountsController();

    $columns = [
        "first_name", 
        "last_name", 
        "email_address",
        "phone_number", 
        "password", 
        "account_status", 
        "position", 
        "role_id", 
        "department_id"
    ]; // Assuming these are your columns

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email_address = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $role_id = $_POST['role_id'];
    $department_id = $_POST['department_id'];

    $roles = new Account();
    $role = $roles->find('Roles', $_POST['role_id'], 'role_id');
    $position = $role['role_name'];

    $data = [
        $first_name,
        $last_name,
        $email_address,
        $phone_number,
        password_hash($password, PASSWORD_DEFAULT),
        "active",
        $position,
        $role_id,
        $department_id
    ];

    $account->createAccout($columns, $data);
}