<?php
    class Users extends Controller{
        public function __construct() {
            if(isLoggedIn()){
                redirect('messages');
            }
            $this->userModel = $this->model('User');
        }

        public function register(){
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process form
                $filename = $_FILES["profilepic"]["name"];
                $tempname = $_FILES["profilepic"]["tmp_name"];
                // Folder 
                $folder = "E:/htdocs/ColaDating/public/img/profilepic/" . $filename;
                move_uploaded_file($tempname, $folder);
                $filename = '/img/profilepic/' . $_FILES["profilepic"]["name"];
                
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                // Init data
                $data =[
                    'username' => trim($_POST['username']),
                    'password' => trim($_POST['password']),
                    'passwordConfirmation' => trim($_POST['passwordConfirmation']),
                    'nickname' => trim($_POST['nickname']),
                    'phonenumber' => trim($_POST['phonenumber']),
                    'email' => trim($_POST['email']),
                    'profilepic' => $filename,
                    'username_err' => '',
                    'password_err' => '',
                    'passwordConfirmation_err' => '',
                    'nickname_err' => '',
                    'phonenumber_err' => '',
                    'email_err' => '',
                    'profilepic_err' => ''
                ];

                // Validate Username
                if(empty($data['username'])){
                    $data['username_err'] = 'Please enter username';
                } else {
                    // Check username
                    if($this->userModel->findUserByUsername($data['username'])){
                        $data['username_err'] = 'Username is already used';
                    }
                }

                // Validate Password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter password';
                } elseif (strlen($data['password'] < 6)){
                    $data['password_err'] = 'Password must be at least 6 characters';
                }

                // Validate PasswordConfirmation
                if(empty($data['passwordConfirmation'])){
                    $data['passwordConfirmation_err'] = 'Please confirm password';
                } else {
                    if($data['password'] != $data['passwordConfirmation']){
                        $data['passwordConfirmation_err'] = 'Passwords do not match';
                    }
                }

                // Validate Nickname
                if(empty($data['nickname'])){
                    $data['nickname_err'] = 'Please enter nickname';
                }

                // Validate Phonenumber
                if(empty($data['phonenumber'])){
                    $data['phonenumber_err'] = 'Please enter phonenumber';
                } else {
                    // Check username
                    if($this->userModel->findUserByEmail($data['phonenumber'])){
                        $data['phonenumber_err'] = 'Phonenumber is already used';
                    }
                }

                // Validate Email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter email';
                } else {
                    // Check username
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'Email is already used';
                    }
                }

                if(empty($data['profilepic'])){
                    $data['profilepic_err'] = 'Please upload profilepic';
                }

                // Validate Gender
                // if(empty($data['gender'])){
                //     $data['gender_err'] = 'Please select gender';
                // }

                if(empty($data['username_err']) && empty($data['password_err']) && empty($data['passwordConfirmation_err']) && 
                empty($data['nickname_err']) && empty($data['phonenumber_err']) && 
                empty($data['email_err']) && empty($data['profilepic_err'])){
                    // Validated
                    
                    // Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Register User
                    if($this->userModel->register($data)){
                        redirect('users/login');
                    }else{
                        die('something went wrong');
                    }
                } else {
                    // Load view with error
                    $this->view('users/register', $data);
                }

            } else {
                // Init data
                $data =[
                    'username' => '',
                    'password' => '',
                    'passwordConfirmation' => '',
                    'nickname' => '',
                    'phonenumber' => '',
                    'email' => '',
                    'profilepic' => '',
                    'username_err' => '',
                    'password_err' => '',
                    'passwordConfirmation_err' => '',
                    'nickname_err' => '',
                    'phonenumber_err' => '',
                    'email_err' => '',
                    'profilepic_err' => ''
                ];

                // Load view
                $this->view('users/register', $data);
            }

        }

        public function login() {

            
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'username' => trim($_POST['username']),
                    'password' => trim($_POST['password']),
                    'username_err' => '',
                    'password_err' => ''
                ];

                // Validate Username
                if(empty($data['username'])){
                    $data['username_err'] = 'Please enter username';
                }

                // Validate Password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter password';
                }

                // Check for username
                if($this->userModel->findUserByUsername($data['username'])){
                    // User found

                } else {
                    // User not found
                    $data['username_err'] = 'No user found';
                }

                if(empty($data['username_err']) && empty($data['password_err'])){
                    // Validated
                    // Check and set logged in user
                    $loggedInUser = $this->userModel->login($data['username'], $data['password']);
                    
                    if($loggedInUser){
                        // Create seesion
                        $this->createUserSession($loggedInUser);
                    }else{
                        $data['password_err'] = 'Password incorrect';
                        $this->view('users/login', $data);
                    }
                } else {
                    // Load view with error
                    $this->view('users/login', $data);
                }
            } else {
                // Init data
                $data = [
                    'username' => '',
                    'password' => '',
                    'username_err' => '',
                    'password_err' => ''
                ];
                // Load view
                $this->view('users/login', $data);
            }
            
                        
        }

        public function createUserSession($user){
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_username'] = $user->username;
            $_SESSION['user_nickname'] = $user->nickname;
            $_SESSION['user_profilepic'] = $user->profile_picture;
            // $_SESSION['user_id'] = $user->id;
            redirect('messages');
        }

        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['chatusernow']);
            unset($_SESSION['user_username']);
            unset($_SESSION['user_nickname']);
            session_destroy();
            redirect('users/login');
        }
    }