<?php
    class Messages extends Controller {
        public function __construct() {
            if(!isLoggedIn()){
                redirect('users/login');
            }

            $this->messageModel = $this->model('Message');
        }


        public function index(){

            // $userlist = $this->messageModel->getUserList();
            // // Init data
            // $data = [
            //     'userlist' => $userlist,
            //     'messages' => []
            // ];
            // $this->view('messages/index', $data);
            $userlist = $this->messageModel->getUserList();

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'userlist' => $userlist,
                    'messages' => []
                ];
            $this->view('messages/index', $data);
            // Check for POST
            // if($_SERVER['REQUEST_METHOD'] != 'POST'){

            //     // Process form
            //     $messages = $this->messageModel->getMessages();
            //     $data = [
            //         'userlist' => $userlist,
            //         'messages' => $messages
            //     ];

            //     $this->view('messages/index', $data);
            // } else {
                

            //     // Sanitize POST data
            //     $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //     // Init data
            //     $data = [
            //         'userlist' => $userlist,
            //         'messages' => []
            //     ];
            //     $this->view('messages/index', $data);
            // }
        }

        public function t($chatUserID){
            $userlist = $this->messageModel->getUserList();
            $chatuser = $this->messageModel->getUserByID($chatUserID);
            // Init data
            $messages = $this->messageModel->getMessagesByID($_SESSION['user_id'], $chatUserID);
            $data = [
                'userlist' => $userlist,
                'messages' => $messages,
                'chatuser' => $chatuser
            ];

            $this->view('messages/t', $data);
            
        }
    }

