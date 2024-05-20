<?php
    class Home extends Controller{
        public function index(){
            $category = new Category();
            $categories = $category->findAll();

            $product = new Product();
            $products = $product->latest(6);

            $this->view('home', [
                'categories' => $categories,
                'products' => $products
            ]);
        }
    }