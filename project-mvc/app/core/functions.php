<?php
    function show($stuff){
        echo '<pre>';
        print_r($stuff);
        echo '</pre>';
    }

    function get_var($key){
        if (isset($_POST[$key])){
            echo $_POST[$key];
        }
    }

    function redirect($location){
        header("location: ". ROOT ."/$location");
    }

    function showErrors($errors){
        foreach ($errors as $err){
            echo '<div class="error">'.$err.'</div>';
        }
    }

    function deleteFolderAndContents($dir){
        if (is_dir($dir)){
            $objects = scandir($dir);
            foreach($objects as $object){
                if ($object != "." && $object != ".."){
                    if (filetype($dir . "/" . $object) == "dir"){
                        deleteFolderAndContents($dir . "/" . $object);
                    } else {
                        unlink($dir . "/" . $object);
                    }
                }
            }
            reset($objects);
            if (!rmdir($dir)){
                echo 'Could not delete existing content, please ensure no other programs or utilities are accessing the folder or contents - ' . $dir;
            }
        }
    }

    function generateRandomString($length = 8){
        $characters = '0123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++){
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }

    function category_img_src($id, $filename = ''){
        $dir = 'uploads/categories_img/' . $id;
        $imgFile = $dir . '/' . $filename;
        if (is_dir($dir) && file_exists($imgFile)){
            echo ROOT . '/' . $imgFile;
        }
        else{
            echo ROOT . '/images/no-image.png';
        }
    }

    function product_img_src($id, $filename = ''){
        $dir = 'uploads/products_img/' . $id;
        $imgFile = $dir . '/' . $filename;
        if (is_dir($dir) && file_exists($imgFile)){
            echo ROOT . '/' . $imgFile;
        }
        else{
            echo ROOT . '/images/no-image.png';
        }
    }