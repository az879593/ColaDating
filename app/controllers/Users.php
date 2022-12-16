<?php
    class Users extends Controller{
        public function __construct() {
            $this->userModel = $this->model('User');
        }

        public function register(){
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process form

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
                    // 'gender' => trim($_POST['gender']),
                    'username_err' => '',
                    'password_err' => '',
                    'passwordConfirmation_err' => '',
                    'nickname_err' => '',
                    'phonenumber_err' => '',
                    'email_err' => '',
                    'gender_err' => ''
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

                // Validate Gender
                // if(empty($data['gender'])){
                //     $data['gender_err'] = 'Please select gender';
                // }

                if(empty($data['username_err']) && empty($data['password_err']) && empty($data['passwordConfirmation_err']) && 
                empty($data['nickname_err']) && empty($data['phonenumber_err']) && 
                empty($data['email_err']) && empty($data['gender_err'])){
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
                    'gender' => '',
                    'username_err' => '',
                    'password_err' => '',
                    'passwordConfirmation_err' => '',
                    'nickname_err' => '',
                    'phonenumber_err' => '',
                    'email_err' => '',
                    'gender_err' => ''
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

            } else {
                // Init data
                $data = [
                    'username' => '',
                    'password' => '',
                    'username_err' => '',
                    'password_err' => ''
                ];
            }
            
            // Load view
            $this->view('users/login');            
        }
    }