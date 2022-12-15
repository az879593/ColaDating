<?php
    class Pages extends Controller{
        public function __construct() {
        }

        public function index(){
            echo 'index';
        }

        public function about() { 
            echo 'this is about';
        }
    }

?>