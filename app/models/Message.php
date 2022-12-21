<?php

    class Message {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getUserByID($id){
            $this->db->query('SELECT * FROM tbl_users WHERE id = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();

            return $row;
        }

        public function getUserList(){
            $this->db->query('SELECT * FROM tbl_users');

            $results = $this->db->resultSet();

            return $results;
        }

        public function getAllMessages(){
            $this->db->query('SELECT * FROM tbl_message');

            $results = $this->db->resultSet();

            return $results;
        }

        public function getMessagesByID($user1, $user2){
            $this->db->query('SELECT * FROM tbl_message 
            WHERE (from_user = :user1 AND to_user = :user2)
            OR (from_user = :user2 AND to_user = :user1)');

            $this->db->bind(':user1', $user1);
            $this->db->bind(':user2', $user2);
            $results = $this->db->resultSet();

            return $results;
        }

        public function getMatchList(){
            
        }
    }

?>