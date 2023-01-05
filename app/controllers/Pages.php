<?php
    class Pages extends Controller{
        public function __construct() {
            if(isLoggedIn()){
                redirect('messages');
            }
        }

        public function index(){
            $data = [
                'title' => 'Welcome'
            ];

            $this->view('pages/index', $data);
        }

        public function about() { 
            $this->view('pages/about');
        }
    }

?>