<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?></title>
    <link rel="stylesheet" href="<?= ROOT ?>/css/style.css">
</head>
<body>
    <?php include PATH . 'nav.php'; ?>
    <section class="food-search text-center">
        <div class="container">
            <form action="<?= ROOT ?>/foods">
                <input type="search" name="search" placeholder="Search for Food...">
                <input type="submit" value="Search" class="btn btn-primary">
            </form>
        </div>
    </section>
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php if (is_array($products) && count($products) > 0): ?>
                <?php foreach($products as $item): ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <img src="<?php product_img_src($item->product_id, $item->product_img);  ?>" alt="<?= $item->product_img ?>" class="img-responsive img-curve">
                        </div>

                        <div class="food-menu-desc">
                            <h4><?= $item->product_name ?></h4>
                            <p class="food-price">₱<?= $item->product_price ?></p>
                            <p class="food-detail"><?= $item->product_details ?></p>
                            <br>
                            <a href="<?= ROOT ?>/foods/add_order/<?= $item->product_id ?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                No Result
            <?php endif; ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- social Section Starts Here -->
    <?php include PATH . 'social.php'; ?>
    <?php include PATH . 'footer.php'; ?>
</body>
</html>