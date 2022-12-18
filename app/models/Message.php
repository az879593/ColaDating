<?php

    class Message {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getUserList(){
            $this->db->query('SELECT * FROM tbl_users');

            $results = $this->db->resultSet();

            return $results;
        }

        public function getMessages(){
            $this->db->query('SELECT * FROM tbl_message');

            $results = $this->db->resultSet();

            return $results;
        }
    }

?>