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

            $admin = new Admin();
            $admins = $admin->findAll();

            $this->view('admin/accounts', [
                'admins' => $admins
            ]);
        }

        public function add_account(){
            $this->isLoggedIn();
            $this->view('admin/add-account', [
                'err' => []
            ]);
        }

        public function insert_account(){
            if (count($_POST) > 0){
                $admin = new Admin();

                if ($admin->isExists($_POST, 'username')){
                    $admin->errors['username'] = 'Username already exists!';
                }
                if ($admin->isExists($_POST, 'email')){
                    $admin->errors['email'] = 'Email already exists!';
                }

                if (count($admin->errors) > 0){
                    $this->view('admin/add-account', [
                        'err' => $admin->errors
                    ]);
                }
                else{
                    $password = generateRandomString();
                    $_POST['password'] = password_hash($password, PASSWORD_DEFAULT);

                    $mailer = new Mailer();
                    $message  = 'Welcome to ' . APP_NAME. '! This is your credentials: <br>' .
                                'Username: ' . $_POST['username'] . '<br>' .
                                'Password: ' . $password;
                    $email = $_POST['email'];
                    $fname = $_POST['first_name'];
                    $mailer->send($message, $email, $fname);

                    
                    $admin->insert($_POST);
                    redirect('admins/accounts');
                }
            }
            else {
                redirect('admins/accounts');
            }
        }

        public function edit_account($id){
            $this->isLoggedIn();

            $admin = new Admin();
            $admin_id['admin_id'] = $id;
            $result = $admin->first($admin_id);

            $this->view('admin/edit-account', [
                'admin' => $result,
                'err' => []
            ]);
        }

        public function update_account(){
            if (count($_POST) > 0){
                $admin = new Admin();
                $id['admin_id'] = $_POST['admin_id'];
                $oldData = $admin->first($id);

                if ($admin->isExists($_POST, 'username', $_POST, 'admin_id')){
                    $admin->errors['username'] = 'Username already exists!';
                }
                if ($admin->isExists($_POST, 'email', $_POST, 'admin_id')){
                    $admin->erros['email'] = 'Email already exists!';
                }
                if (!empty($_POST['current_pass'])){
                    if (!password_verify($_POST['current_pass'], $oldData->password)){
                        $admin->errors['current_pass'] = 'Invalid Current Password!';
                    }
                    if ($_POST['password'] != $_POST['confirm_pass']){
                        $admin->errors['new_pass'] = "Password didn't match!";
                    }
                    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                }
                else{
                    unset($_POST['password']);
                }
                unset($_POST['current_pass']);
                unset($_POST['confirm_pass']);

                if (count($admin->errors) > 0){
                    $this->view('admin/edit-account', [
                        'admin' => $oldData,
                        'err' => $admin->errors
                    ]);
                }
                else{
                    $admin->update($_POST['admin_id'], $_POST, 'admin_id');
                    if ($_POST['admin_id'] == $_SESSION['user']->admin_id){
                        $newData = $admin->first($id);
                        Auth::setLogIn($newData);
                    }
                    redirect('admins/accounts');
                }
            }
            else {
                redirect('admins/accounts');
            }
        }

        public function delete_account($id){
            $this->isLoggedIn();

            $admin = new Admin();
            $admin->delete($id, 'admin_id');
            redirect('admins/accounts');
        }

        public function categories(){
            $this->isLoggedIn();

            $category = new Category();
            $categories = $category->findAll();

            $this->view('admin/categories', [
                'categories' => $categories
            ]);
        }

        public function add_category(){
            $this->isLoggedIn();

            $this->view('admin/add-category', [
                'err' => []
            ]);
        }

        public function insert_category(){
            if (count($_POST) > 0){
                $category = new Category();

                if ($category->isExists($_POST, 'category_name')){
                    $category->errors['category_name'] = 'Category Name already exists!';
                }
                else {
                    $_POST['category_img'] = basename($_FILES['category_img']['name']);
                    $category->insert($_POST);
                    
                    $lastId = $category->lastId;
                    $dir = 'uploads/categories_img/' . $lastId;
                    if (!is_dir($dir)){
                        mkdir($dir);
                    }

                    $imgFile = $dir . '/' . $_POST['category_img'];
                    $tmpFile = $_FILES['category_img']['tmp_name'];
                    $upload = move_uploaded_file($tmpFile, $imgFile);
                    if (!$upload){
                        $category->errors['category_img'] = 'Inserted but failed to upload the image.';
                    }
                }

                if (count($category->errors) > 0){
                    $this->view('admin/add-category', [
                        'err' => $category->errors
                    ]);
                }
                else {
                    redirect('admins/categories');
                }
            }
            else {
                redirect('admins/categories');
            }
        }

        public function edit_category($id){
            $this->isLoggedIn();

            $category = new Category();
            $ctgryId['category_id'] = $id;
            $result = $category->first($ctgryId);
            $this->view('admin/edit-category', [
                'category' => $result,
                'err' => []
            ]);
        }

        public function update_category(){
            if (count($_POST) > 0){
                $category = new Category();

                if ($category->isExists($_POST, 'category_name', $_POST, 'category_id')){
                    $category->errors['category_name'] = 'Category Name already exists!';
                }
                else {
                    $categoryId['category_id'] = $_POST['category_id'];
                    $oldData = $category->first($categoryId);
                    if (!empty(basename($_FILES['category_img']['name']))){
                        $_POST['category_img'] = basename($_FILES['category_img']['name']);
                    }
                    
                    if (!empty($_POST['category_img'])){
                        $dir = 'uploads/categories_img/' . $_POST['category_id'];
                        if (!is_dir($dir)){
                            mkdir($dir);
                        }

                        $newImg = $dir . '/' . $_POST['category_img'];
                        $tmpImg = $_FILES['category_img']['tmp_name'];
                        $upload = move_uploaded_file($tmpImg, $newImg);
                        if ($upload){
                            $oldImg = $dir . '/' . $oldData->category_img;
                            if ($oldData->category_img != $_POST['category_img'] && file_exists($oldImg)){
                                unlink($oldImg);
                            }
                        }
                        else {
                            $category->errors['category_img'] = 'Failed to upload the image.';
                        }
                    }
                }

                if (count($category->errors) > 0){
                    $this->view('admin/edit-category', [
                        'category' => $oldData,
                        'err' => $category->errors
                    ]);
                }
                else{
                    $category->update($_POST['category_id'], $_POST, 'category_id');
                    redirect('admins/categories');
                }
            }
            else {
                redirect('admins/categories');
            }
        }

        public function delete_category($id){
            $this->isLoggedIn();

            $category = new Category();
            $categoryId['category_id'] = $id;
            $selected = $category->first($categoryId);
            $category->delete($id, 'category_id');
            $dir = 'uploads/categories_img/' . $selected->category_id;
            deleteFolderAndContents($dir);
            redirect('admins/categories');
        }

        public function beverages(){
            $this->isLoggedIn();

            $product = new Product();
            $products = $product->findAll();

            $this->view('admin/beverages', [
                'products' => $products
            ]);
        }

        public function add_beverage(){
            $this->isLoggedIn();

            $category = new Category();
            $categories = $category->findAll();

            $this->view('admin/add-beverage', [
                'categories' => $categories,
                'err' => []
            ]);
        }

        public function insert_beverage(){
            if (count($_POST) > 0){
                $product = new Product();
                $category = new Category();

                if (floatval($_POST['product_price']) <= 0){
                    $product->errors['product_price'] = 'Product Price must be greater than zero!';
                }
                else {
                    $categoryId['category_id'] = $_POST['category_id'];
                    $selected = $category->first($categoryId);
                    $_POST['product_category'] = $selected->category_name;

                    $_POST['product_img'] = basename($_FILES['product_img']['name']);
                    $product->insert($_POST);
                    
                    $lastId = $product->lastId;
                    $dir = 'uploads/products_img/' . $lastId;
                    if (!is_dir($dir)){
                        mkdir($dir);
                    }

                    $imgFile = $dir . '/' . $_POST['product_img'];
                    $tmpFile = $_FILES['product_img']['tmp_name'];
                    $upload = move_uploaded_file($tmpFile, $imgFile);
                    if (!$upload){
                        $product->errors['product_img'] = 'Inserted but failed to upload the image.';
                    }
                }

                if (count($product->errors) > 0){
                    $this->view('admin/add-beverage', [
                        'err' => $product->errors
                    ]);
                }
                else {
                    redirect('admins/beverages');
                }
            }
            else {
                redirect('admins/beverages');
            }
        }

        public function edit_beverage($id){
            $this->isLoggedIn();

            $product = new Product();
            $productId['product_id'] = $id;
            $result = $product->first($productId);
            $category = new Category();
            $categories = $category->findAll();

            $this->view('admin/edit-beverage', [
                'product' => $result,
                'categories' => $categories,
                'err' => []
            ]);
        }

        public function update_beverage(){
            if (count($_POST) > 0){
                $product = new Product();
                $category = new Category();

                $productId['product_id'] = $_POST['product_id'];
                $oldData = $product->first($productId);

                $categoryId['category_id'] = $_POST['category_id'];
                $selected = $category->first($categoryId);
                $_POST['product_category'] = $selected->category_name;
                
                if (!empty(basename($_FILES['product_img']['name']))){
                    $_POST['product_img'] = basename($_FILES['product_img']['name']);
                }
                
                if (!empty($_POST['product_img'])){
                    $dir = 'uploads/products_img/' . $_POST['product_id'];
                    if (!is_dir($dir)){
                        mkdir($dir);
                    }

                    $newImg = $dir . '/' . $_POST['product_img'];
                    $tmpImg = $_FILES['product_img']['tmp_name'];
                    $upload = move_uploaded_file($tmpImg, $newImg);
                    if ($upload){
                        $oldImg = $dir . '/' . $oldData->product_img;
                        if ($oldData->product_img != $_POST['product_img'] && file_exists($oldImg)){
                            unlink($oldImg);
                        }
                    }
                    else {
                        $product->errors['product_img'] = 'Failed to upload the image.';
                    }
                }

                if (count($product->errors) > 0){
                    $newData = $product->first($productId);
                    $categories = $category->findAll();

                    $this->view('admin/edit-beverage', [
                        'product' => $newData,
                        'categories' => $categories,
                        'err' => $product->errors
                    ]);
                }
                else{
                    $product->update($_POST['product_id'], $_POST, 'product_id');
                    redirect('admins/beverages');
                }
            }
            else {
                redirect('admins/beverages');
            }
        }

        public function delete_beverage($id){
            $this->isLoggedIn();

            $product = new Product();
            $productId['product_id'] = $id;
            $selected = $product->first($productId);
            $product->delete($id, 'product_id');
            $dir = 'uploads/products_img/' . $selected->product_id;
            deleteFolderAndContents($dir);
            redirect('admins/beverages');
        }

        public function orders(){
            $this->isLoggedIn();

            $order = new Order();
            $orders = $order->visible_orders();

            $this->view('admin/orders', [
                'orders' => $orders
            ]);
        }

        public function view_order($id){
            $this->isLoggedIn();

            $order = new Order();
            $orderId['order_id'] = $id;
            $selectedOrder = $order->first($orderId);
            $productId['product_id'] = $selectedOrder->product_id;

            $product = new Product();
            $selectedProduct = $product->first($productId);

            $this->view('admin/view-order', [
                'order' => $selectedOrder,
                'product' => $selectedProduct
            ]);
        }

        public function prepare_order($id){
            $this->modify_order_status($id, 'preparing');
        }

        public function ready_for_pickup($id){
            $this->modify_order_status($id, 'ready for pickup');
        }

        public function delivering($id){
            $this->modify_order_status($id, 'delivering');
        }

        public function delivered($id){
            $this->modify_order_status($id, 'delivered');
        }

        private function modify_order_status($id, $status){
            $this->isLoggedIn();

            $order = new Order();
            $data['order_id'] = $id;
            $data['status'] = $status;
            $order->update($data['order_id'], $data, 'order_id');
            redirect('admins/orders');
        }

        public function order_paid($id){
            $this->modify_paid_status($id, true);
        }

        public function order_unpaid($id){
            $this->modify_paid_status($id, false);
        }

        private function modify_paid_status($id, $bool){
            $this->isLoggedIn();

            $order = new Order();
            $data['order_id'] = $id;
            $data['is_paid'] = intval($bool);
            $order->update($data['order_id'], $data, 'order_id');
            redirect('admins/orders');
        }

        public function delete_order($id){
            $this->isLoggedIn();

            $order = new Order();
            $order->delete($id, 'order_id');
            redirect('admins/orders');
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