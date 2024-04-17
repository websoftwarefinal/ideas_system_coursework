<?php
require_once __DIR__ . './../Helpers/SessionManager.php';
require_once __DIR__ . './../Models/User.php';

class Authentications{
    public function login(string $username, string $password){
        $session = new SessionManager();

        $user = new User();

        // Trying to authenticate the user
        $auth = $user->authenticate("Staff", $username, $password);


        if($auth){
            $session->unsetSession('error');

            $session->set('staff_id', $auth['staff_id']);
            $session->set('username', $auth['email_address']);
            $session->set('first_name', $auth['first_name']);
            $session->set('last_name', $auth['last_name']);
            $session->set('phone_number', $auth['phone_number']);

            $role = $user->find('Roles', $auth['role_id'], 'role_id');
            $session->set('role', $role['role_name']);

            // Storing the last login for the user
            $user->store("Login_staff", ["staff_id", "date_time"], [$auth['staff_id'], date('Y-m-d H:i:s')]);

            if($role['role_name'] == 'Admin'){
                header("Location: /admin-controls");
            }else{
                header("Location: /ideas");
            }
        }else{
            $session->set('error', 'Email or password is incorrect!');
            header("Location: /");
        }
    }

    public function logout(){
        $session = new SessionManager();
        $session->destroy();
        header("Location: /");
    }
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $auth = new Authentications();

    $username = null;
    $password = null;
    $logout = null;

    if(isset($_POST['username']) && $_POST['username'] != ''){
        $username = $_POST['username'];
    }

    if(isset($_POST['password']) && $_POST['password'] != ''){
        $password = $_POST['password'];
    }

    // Authenticating
    if($username && $password){
        $auth->login($username, $password);
    }

    // Loging out.
    if(isset($_POST['logout'])){
        $auth->logout();
    }
}