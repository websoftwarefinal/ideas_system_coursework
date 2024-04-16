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
    header("Location: /home");
}