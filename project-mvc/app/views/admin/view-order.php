<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milktea Ordering prototype</title>

    
    <link rel="stylesheet" href="<?= ROOT ?>/css/style.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/admin.css">
</head>

<body>
    <div class="img_area"></div>
    
    <?php include PATH . 'admin-nav.php'; ?>


    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-black">Fill this form to confirm your order.</h2>

            <form action="<?= ROOT ?>/foods/insert_order" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <img src="<?php product_img_src($product->product_id, $product->product_img); ?>" alt="<?= $product->product_img ?>" class="img-responsive img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?= $product->product_name ?></h3>
                        <p class="food-price" id="cost-display">₱<?= $product->product_price ?></p>

                        <div class="order-label">Quantity</div>
                        <input type="number" id="qty-elem" name="qty" class="input-responsive" value="<?= $order->qty ?>" disabled>
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="fullname" placeholder="" value="<?= $order->fullname ?>" class="input-responsive" disabled>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="" value="<?= $order->contact ?>" class="input-responsive" disabled>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="" value="<?= $order->email ?>" class="input-responsive" disabled>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="" class="input-responsive" disabled><?= $order->address ?></textarea>

                    <a href="<?= ROOT ?>/admins/orders" class="btn btn-primary">Go Back</a>
                </fieldset>

            </form>

        </div>
    </section>
   

    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    

    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">BSIS 3-B</a></p>
        </div>
    </section>
   
    <script type="text/javascript" src="<?= ROOT ?>/js/orders.js"></script>
</body>
</html>