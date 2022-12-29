<?php
    class Messages extends Controller {
        public function __construct() {
            if(!isLoggedIn()){
                redirect('users/login');
            }

            $this->messageModel = $this->model('Message');
        }


        public function index(...$chatuseridnow){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data =[
                    'text' => $_POST['text'],
                    'from_id' => $_POST['from_id'],
                    'to_id' => $_POST['to_id'],
                ];
                $this->messageModel->sendMessage($data);
            } else if(isset($chatuseridnow[0])){
                $userlist = $this->messageModel->getMatchList();
                $msg_history = $this->messageModel->getMessagesByID($_SESSION['user_id'],$chatuseridnow[0]);
                $chatusernow = $this->messageModel->getUserByID($chatuseridnow[0]);
                $data = [
                    'chatusernow' => $chatusernow,
                    'userlist' => $userlist,
                    'messages' => $msg_history
                ];
                $this->view('messages/index', $data);
            } else {
                // $userlist = $this->messageModel->getUserList();
                $userlist = $this->messageModel->getMatchList();
                // Init data
                $data = [
                    'chatusernow' => null,
                    'userlist' => $userlist,
                    'messages' => []
                ];
                $this->view('messages/index', $data);
            }
        }

        public function chatusernow($chatUserID){
            
            $chatusernow = $this->messageModel->getUserByID($chatUserID);
            $_SESSION['chatusernow'] = $chatUserID;
            $data = [
                'chatusernow' => $chatusernow
            ];
            return $this->view('messages/chatusernow', $data);
        }

        public function history($chatUserID){
            $messages = $this->messageModel->getMessagesByID($_SESSION['user_id'], $chatUserID);
            $data = [
                'messages' => $messages
            ];
            return $this->view('messages/history', $data);
        }

        public function typearea($chatUserID){
            $chatusernow = $this->messageModel->getUserByID($chatUserID);
            $data = [
                'chatusernow' => $chatusernow
            ];
            return $this->view('messages/typearea', $data);
        }
        
    }

