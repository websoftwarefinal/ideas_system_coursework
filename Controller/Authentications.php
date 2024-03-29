<?php
require_once __DIR__ . './../Helpers/Database.php';
require_once __DIR__ . './../Helpers/SessionManager.php';

class Authentications{
    public function register(){
        return "I am the register";
    }

    public function login(string $username, string $password) : void{
        $session = new SessionManager();

        if($username == 'sokoenock@gmail.com' && $password == '12345678'){
            $session->unsetSession('error');
            $session->set('username', $username);
            header("Location: /home");
        }else{
            $session->set('error', 'Email or password is incorrect!');
            header("Location: /");
        }
    }
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $auth = new Authentications();
    $username = $_POST['username'];
    $password = $_POST['password'];

    $auth->login($username, $password);
}