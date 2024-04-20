<?php
require_once __DIR__ . '/SessionManager.php';
require_once __DIR__ . '/../Models/Role.php';
require_once __DIR__ . '/../Models/Department.php';
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Models/Category.php';

$role = new Role();
$role->createRole();

$user = new Department();
$user->createDepartment();

$user = new User();
$user->createAdminUser();

$user = new Category();
$user->createCategories();

$session = new SessionManager();

if($session->get('username')){
    $role = $session->get('role');
    
    if($role == 'Admin'){
        header("Location: /admin-controls");
    }else if($role == 'Staff'){
        header("Location: /ideas");
    }else if($role == 'QA Manager'){
        header("Location: /qa-manager-controls");
    }else if($role == 'QA Cordinator'){
        header("Location: /qa-cordinator-controls");
    }
}