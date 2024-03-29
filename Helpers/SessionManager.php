<?php
class SessionManager{
    public function __construct() {
        // Start the session
        session_start();
    }

    public function set($key, $value) {
        // Set session variable
        $_SESSION[$key] = $value;
    }

    public function get($key) {
        // Get session variable
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return null;
        }
    }

    public function destroy() {
        // Destroy the session
        session_destroy();
    }

    public function unsetSession($key){
        unset($_SESSION[$key]);
    }

    public function sessionProtection(){
        if(!isset($_SESSION['username']) || (isset($_SESSION['username']) && $_SESSION['username'] == '')){
            header("Location: /"); 
        }
    }
}