<?php
    class User {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Register User
        public function register($data){
            $this->db->query('INSERT INTO tbl_users (username, password, nickname, phonenumber, email, profile_picture) VALUES 
            (:username, :password, :nickname, :phonenumber, :email, :profile_picture)');
            
            // Bind value
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':nickname', $data['nickname']);
            $this->db->bind(':phonenumber', $data['phonenumber']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':profile_picture', $data['profilepic']);

            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
            
        }

        // User Login
        public function login($username, $password){
            $this->db->query('SELECT * FROM tbl_users WHERE username = :username');
            $this->db->bind(':username', $username);

            $row = $this->db->single();

            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)){
                return $row;
            } else {
                return false;
            }            
        }

        // Find user by username
        public function findUserByUsername($username){
            $this->db->query('SELECT * FROM tbl_users WHERE username = :username');
            $this->db->bind(':username', $username);

            $row = $this->db->single();

            // Check row
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }

        // Find user by email
        public function findUserByEmail($email){
            $this->db->query('SELECT * FROM tbl_users WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            // Check row
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }

        // Find user by phonenumber
        public function findUserByPhonenumber($phonenumber){
            $this->db->query('SELECT * FROM tbl_users WHERE phonenumber = :phonenumber');
            $this->db->bind(':phonenumber', $phonenumber);

            $row = $this->db->single();

            // Check row
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }
    }