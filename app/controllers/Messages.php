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
                    'msg_id' => null
                ];
                $this->messageModel->sendMessage($data);
                $data['msg_id'] = $this->messageModel->getMessagesID($_POST['from_id'], $_POST['to_id'])->msg_id;
                $this->messageModel->updateLatestMessage($data);      
                
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

        public function match(){
            // $userlist = $this->messageModel->getUserList();
            $userlist = $this->messageModel->getMatchList();
            $matchusernow = $this->messageModel->getRandomUser();
            // Init data
            $data = [
                'chatusernow' => null,
                'userlist' => $userlist,
                'matchusernow' => $matchusernow
            ];
            $this->view('messages/match', $data);
        }

        public function matchcard(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $matchusernow = $this->messageModel->getRandomUser();
                $data = [
                    'matchusernow' => $matchusernow
                ];
                return $this->view('messages/matchcard', $data);
            }
        }

        public function matchlist(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $userlist = $this->messageModel->getMatchList();
                $data = [
                    'userlist' => $userlist
                ];
                return $this->view('messages/chatlist', $data);
            }else{
                redirect('messages');
            }
        }

        public function chatusernow(...$chatUserID){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $chatusernow = $this->messageModel->getUserByID($chatUserID[0]);
                $_SESSION['chatusernow'] = $chatUserID;
                $data = [
                    'chatusernow' => $chatusernow
                ];
                return $this->view('messages/chatusernow', $data);
            }else{
                redirect('messages');
            }
            
        }

        public function chatroomnav(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                return $this->view('messages/chatroomnav');
            }else{
                redirect('messages');
            }
        }

        public function history(...$chatUserID){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $messages = $this->messageModel->getMessagesByID($_SESSION['user_id'], $chatUserID[0]);
                $data = [
                    'messages' => $messages
                ];
                return $this->view('messages/history', $data);
            }else{
                redirect('messages');
            }
        }

        public function typearea(...$chatUserID){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $chatusernow = $this->messageModel->getUserByID($chatUserID[0]);
                $data = [
                    'chatusernow' => $chatusernow
                ];
                return $this->view('messages/typearea', $data);
            }else{
                redirect('messages');
            }
        }
        
    }

