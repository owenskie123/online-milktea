<?php
    function show($stuff){
        echo '<pre>';
        print_r($stuff);
        echo '</pre>';
    }

    function redirect($location){
        header("location: ". ROOT ."/$location");
    }

    function showErrors($errors){
        foreach ($errors as $err){
            echo '<div class="error">'.$err.'</div>';
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