<?php
    class Matches extends Controller {
        public function __construct() {
            if(!isLoggedIn()){
                redirect('users/login');
            }

            // $this->messageModel = $this->model('');
        }

        public function index(){
            $this->view('matches/index');
        }

    }

    