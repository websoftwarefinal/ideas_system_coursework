<?php
require_once __DIR__ . '/Model.php';

class User extends Model{
    // In this class you can write all the custom methods that do not exist in the Parent Model


    public function createAdminUser(){
        $users = $this->get('Staff');

        $roles = $this->get('Roles');
        $departments = $this->get('Department');

        if(count($users) == 0 && count($roles) > 0 && count($departments) > 0){
            $role_id = $roles[0]['role_id'];
            $department_id = $departments[0]['department_id'];

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
        
            $data = [
                "Admin",
                "Admin",
                "admin@admin.com",
                "0977000000",
                password_hash("12345678", PASSWORD_DEFAULT),
                "active",
                "Admin",
                $role_id, 
                $department_id
            ];

            $this->store("Staff", $columns, $data);
        }
    }

    public function authenticate($table, $email, $password){
        // Method to get record
        try {
            $sql = "SELECT * FROM $table WHERE email_address = ?";
            $params = [$email];

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($password, $user['password'])) {
                // Passwords match, return user data
                return $user;
            } else {
                // Passwords don't match
                return false;
            }
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
    }

    public function lastStaffLogin($staff_id){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM Login_Staff WHERE $staff_id = ? ORDER BY date_time DESC LIMIT 1");
            $stmt->execute([$staff_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
    }
}