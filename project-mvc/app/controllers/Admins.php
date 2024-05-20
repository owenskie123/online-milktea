<?php
    class Admins extends Controller{
        public function index(){
            $this->home();
        }

        public function home(){
            $this->isLoggedIn();

            $admin = new Admin();
            $adminCount = $admin->count('admin_id');

            $product = new Product();
            $productCount = $product->count('product_id');

            $category = new Category();
            $categoryCount = $category->count('category_id');
            $this->view('admin/home', [
                'adminCount' => $adminCount,
                'beverageCount' => $productCount,
                'categoryCount' => $categoryCount
            ]);
        }

        public function accounts(){
            $this->isLoggedIn();

            $this->view('admin/accounts', [
                
            ]);
        }

        public function logout(){
            Auth::logout();
            redirect('login');
        }

        private function isLoggedIn(){
            if (!Auth::isLoggedIn()){
                redirect('login');
            }
        }
    }