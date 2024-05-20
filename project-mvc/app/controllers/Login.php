<?php
    class Login extends Controller{
        public function index(){
            if (Auth::isLoggedIn()){
                redirect('admins');
            }
            
            $this->view('login', [
                'err' => []
            ]);
        }

        public function auth(){
            if (count($_POST) > 0){
                $admin = new Admin();
                $user['username'] = $_POST['username'];
                $auth = $admin->first($user);
                if ($auth){
                    if (password_verify($_POST['password'], $auth->password)){
                        Auth::setLogIn($auth);
                        redirect('admins');
                    }
                    else{
                        $admin->errors['auth'] = 'Username or password is invalid!';
                    }
                }
                else {
                    $admin->errors['auth'] = 'Username or password is invalid!';
                }
                
                if (count($admin->errors) > 0){
                    $this->view('login', [
                        'err' => $admin->errors
                    ]);
                }
            }
            else{
                redirect('login');
            }
        }
    }