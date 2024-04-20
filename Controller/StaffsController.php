<?php
require_once __DIR__ . './../Models/User.php';

class StaffsController{
    public function banStaff($staff_id, $columns, $data){
        $staff = new User;
        $staff->update('Staff', $staff_id, $columns, $data, 'staff_id');

        header("Location: /qa-manager-controls"); 
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['_method']) && $_POST['_method'] == 'update_status'){
        $staff = new StaffsController;

        $columns = [
            "account_status",
            "posts_banned"
        ];

        $staff_id = $_POST['staff_id'];
        $account_status = $_POST['status'];
        $posts_banned = isset($_POST['posts_banned']) ? $_POST['posts_banned'] : 0;

        if($account_status == 'active'){
            $posts_banned = 0;
        }

        $data = [
            $account_status,
            $posts_banned
        ];

        $staff->banStaff($staff_id, $columns, $data);
    }
}