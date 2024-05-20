<?php
    class Auth{
        public static function setLogIn($user){
            $_SESSION['user'] = $user;
        }

        public static function logout(){
            unset($_SESSION['user']);
        }

        public static function isLoggedIn(){
            return isset($_SESSION['user']) ? true : false;
        }
    }