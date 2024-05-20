<?php
    class Foods extends Controller{
        public function index(){
            $product = new Product();
            if (isset($_GET['search'])){
                $data = ['product_name', 'product_category'];
                $products = $product->like($data, $_GET['search']);
            }
            else if (isset($_GET['category'])){
                $data['product_category'] = $_GET['category'];
                $products = $product->where($data);
            }
            else{
                $products = $product->findAll();
            }
            $this->view('foods', [
                'products' => $products
            ]);
        }

        public function add_order($id){
            $product = new Product();
            $data['product_id'] = $id;
            $result = $product->where($data);
            $this->view('orders', [
                'product' => $result[0]
            ]);
        }

        public function insert_order(){
            if (count($_POST) > 0){
                $order = new Order();
                $_POST['cost'] = intval($_POST['qty']) * intval($_POST['base_price']);
                $_POST['status'] = 'new';
                unset($_POST['base_price']);
                $order->insert($_POST);
                ?>
                    <script>
                        alert('Order Placed!');
                        window.location.href = '<?= ROOT ?>/foods';
                    </script>
                <?php
            }
            else {
                redirect('foods/index');
            }
        }
    }