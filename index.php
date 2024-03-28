<?php

require_once __DIR__ . '/Helpers/Database.php';

$user = new Database('users');

$users = $user->select(['first_name', 'last_name', 'email']);

foreach($users as $item){
    echo $item['first_name'] . ' ' . $item['last_name'] . '<br />'; 
}