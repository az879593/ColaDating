<?php
    session_start();

    // Flash message helper
    // Example - falsh();

    function flash($name = '', $message = '', $class = 'alert alert-success'){
        
    }

    function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        } else {
            return false;
        }
    }