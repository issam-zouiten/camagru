<?php
    class Users extends Controller
    {
        public function __construct()
        {
            $this->usermodel = $this->model('User');

        }

        public function register()
        {
            //chock for post
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                //process form
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                //validate email
                if(empty($data['email']))
                {
                    $data['email_err'] = 'Please enter your email';
                }
                else
                {
                    //check email
                    if ($this->usermodel->finduserbyemail($data['email']))
                        $data['email_err'] = 'Email is already taken';
                        
                }
                //echo "eror" . $data['email_err'];
                //validate name
                if(empty($data['name']))
                {
                    $data['name_err'] = 'Please enter your name';
                }
                //validate password
                if(empty($data['password']))
                {
                    $data['password_err'] = 'Please enter your password';
                }
                else if(strlen($data['password']) < 6)
                {
                    $data['password_err'] = 'Password must be at least 6 charachters';
                }
                //validate confirm password
                if(empty($data['confirm_password']))
                {
                    $data['confirm_password_err'] = 'Please confirm your password';
                }
                else
                {
                    if ($data['password'] != $data['confirm_password'])
                    {
                        $data['confirm_password_err'] = 'Password do not match';   
                    }
                }
                //make sure errors are empty
                if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']))
                {
                    //hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    //load view with errors
                    //$this->view('users/register', $data);
                    // register uder
                    if ($this->usermodel->register($data))
                        redirect('users/login');
                    else
                        die('tkhawr');
                }
                else
                    $this->view('users/register', $data);
            }
            else
            {
                //init data
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];
                //load view
                $this->view('users/register', $data);
            }
        }

        public function login()
        {
            //chock for post
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                //process form
                //process form
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => '',
                ];

                //validate email
                if(empty($data['email']))
                {
                    $data['email_err'] = 'Please enter your email';
                }
                //validate password
                if(empty($data['password']))
                {
                    $data['password_err'] = 'Please enter your password';
                }

                //make sure errors are empty
                if (empty($data['email_err']) && empty($data['password_err']))
                {
                    die('SUCCESS');
                }
                else
                {
                    //load view with errors
                    $this->view('users/login', $data);
                }
            }
            else
            {
                //init data
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => '',
                ];
                //load view
                $this->view('users/login', $data);
            }
        }

    }