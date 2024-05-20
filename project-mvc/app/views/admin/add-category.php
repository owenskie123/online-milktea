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
            <form action="<?= ROOT ?>/admins/insert_category" method="POST" enctype="multipart/form-data">
                <h2>Add Category</h2>
                <fieldset>
                    <legend>Category Details</legend>
                    <?php showErrors($err); ?>

                    <div class="order-label">Category Image : </div>
                    <input type="file" id="category-file" name="category_img" class="input-responsive" required>

                    <div class="order-label">Category Name : </div>
                    <input type="text" name="category_name" value="<?php get_var('category_name'); ?>" placeholder="" class="input-responsive" required>

                    <input type="submit" value="Add Category" class="btn btn-primary">
                </fieldset>
            </form>
        </div>
    </main>
    <?php include PATH . 'admin-footer.php'; ?>
    <script type="text/javascript" src="<?= ROOT ?>/js/category.js"></script>
</body>
</html>