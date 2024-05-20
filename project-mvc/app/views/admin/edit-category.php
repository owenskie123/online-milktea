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
            <form action="<?= ROOT ?>/admins/update_category" method="POST" enctype="multipart/form-data">
                <h2>Edit Category</h2>
                <fieldset>
                    <legend>Category Details</legend>
                    <?php showErrors($err); ?>
                    <div class="order-label">Current Image : </div>
                    <div>
                        <img class="image-display" src="<?php category_img_src($category->category_id, $category->category_img); ?>" alt="<?= $category->category_img ?>">
                    </div>

                    <div class="order-label">New Image : </div>
                    <input type="file" id="category-file" name="category_img" class="input-responsive">

                    <div class="order-label">Category Name : </div>
                    <input type="text" name="category_name" value="<?= $category->category_name ?>" placeholder="" class="input-responsive" required>

                    <input type="hidden" name="category_id" value="<?= $category->category_id ?>">
                    <input type="submit" value="Update Category" class="btn btn-primary">
                </fieldset>
            </form>
        </div>
    </main>
    <?php include PATH . 'admin-footer.php'; ?>
    <script type="text/javascript" src="<?= ROOT ?>/js/category.js"></script>
</body>
</html>