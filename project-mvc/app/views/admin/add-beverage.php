<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/css/style.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/admin.css">
    <title><?= APP_NAME ?></title>
</head>
<body>
    <?php include PATH . 'admin-nav.php'; ?>
    <main>
        <div class="container">
            <form action="<?= ROOT ?>/admins/insert_beverage" method="POST" enctype="multipart/form-data">
                <h2>Add Beverage</h2>
                <fieldset>
                    <legend>Beverage Details</legend>
                    <?php showErrors($err); ?>

                    <div class="order-label">Product Image : </div>
                    <input type="file" id="product-file" name="product_img" class="input-responsive" required>

                    <div class="order-label">Product Name : </div>
                    <input type="text" name="product_name" value="<?php get_var('product_name'); ?>" placeholder="" class="input-responsive" required>

                    <div class="order-label">Product Details : </div>
                    <textarea name="product_details" rows="10" placeholder="" class="input-responsive"><?php get_var('product_details'); ?></textarea>

                    <div class="order-label">Product Price : </div>
                    <input type="number" step="0.01" placeholder="0.00" name="product_price" value="<?php get_var('product_price'); ?>" class="input-responsive" required>

                    <div class="order-label">Product Category : </div>
                    <select name="category_id" class="input-responsive" required>
                        <option value=""></option>
                        <?php if(is_array($categories) && count($categories) > 0): ?>
                            <?php foreach($categories as $category): ?>
                                <option value="<?= $category->category_id ?>"><?= $category->category_name ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>

                    <input type="submit" value="Add Product" class="btn btn-primary">
                </fieldset>
            </form>
        </div>
    </main>
    <?php include PATH . 'admin-footer.php'; ?>
    <script type="text/javascript" src="<?= ROOT ?>/js/product.js"></script>
</body>
</html>