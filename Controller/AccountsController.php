<?php
require_once __DIR__ . './../Models/Account.php';
require_once __DIR__ . './../Helpers/SessionManager.php';

class AccountsController{
    function getAccounts(){
        
    }

    function createAccout($columns, $data){
        $account = new Account();

        try{
            $account->store("Staff", $columns, $data);

            header("Location: /admin-controls"); 
        }catch(Exception $e){
            $session = new SessionManager;
            $session->set('created_account_error', 'An error occurred: ' . $e->getMessage());
            return $e;
        }
    }

    public function emailExists($email){
        $account = new Account();

        $count = $account->count('Staff', $email, 'email_address');

        if($count > 0){
            return true;
        }else{
            return false;
        }
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $account = new AccountsController();

    $columns = [
        "first_name", 
        "last_name", 
        "username",
        "email_address",
        "phone_number", 
        "password", 
        "account_status", 
        "posts_banned",
        "position", 
        "role_id", 
        "department_id"
    ]; // Assuming these are your columns

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['first_name'] . $_POST['last_name'];
    $email_address = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $role_id = $_POST['role_id'];
    $department_id = $_POST['department_id'];

    // created_account_error

    if($_POST['confirmPwd'] != $_POST['password']){
        $session = new SessionManager;
        $session->set('created_account_error', 'Your passwords do not match!');

        header("Location: /create-account"); 
        return;
    }

    // Checking if email exists
    if($account->emailExists($email_address) == true){
        $session = new SessionManager;
        $session->set('created_account_error', 'User with that email already exists!');

        header("Location: /create-account"); 
        return;
    }

    $roles = new Account();
    $role = $roles->find('Roles', $_POST['role_id'], 'role_id');
    $position = $role['role_name'];

    $data = [
        $first_name,
        $last_name,
        $username,
        $email_address,
        $phone_number,
        password_hash($password, PASSWORD_DEFAULT),
        "active",
        0,
        $position,
        $role_id,
        $department_id
    ];

    $account->createAccout($columns, $data);
}