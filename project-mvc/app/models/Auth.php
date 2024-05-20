<?php
    class Auth{
        public static function setLogIn($user){
            $_SESSION['user'] = $user;
        }

        public static function logout(){
            unset($_SESSION['user']);
        }

        public static function isLoggedIn(){
            if (isset($_SESSION['user'])){
                $admin = new Admin();
                $user['username'] = $_SESSION['user']->username;
                $auth = $admin->first($user);
                if ($auth){
                    if ($_SESSION['user']->password == $auth->password){
                        return true;
                    }
                }
            }
            return false;
        }
    }