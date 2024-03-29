<?php 
require_once __DIR__ . '/../../Helpers/SessionManager.php';
require_once __DIR__ . '/../../Helpers/Database.php';

$db = new Database('users');

$users = $db->get();

foreach($users as $user){
    echo $user['first_name'] . ' ' . $user['last_name'] . '<br />';
}

$session = new SessionManager();
$session->sessionProtection();