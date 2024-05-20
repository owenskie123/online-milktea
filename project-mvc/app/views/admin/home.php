<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/css/admin.css">
    <title><?= APP_NAME ?></title>
</head>
<body>
    <?php include PATH . 'admin-nav.php'; ?>
    <div class="main_content">
        <div class="wrapper">
            <h1>Dashboard</h1>

            <div class="col-4 text_center">
                <h1><?= $adminCount ?></h1>
                <br>
                Admins
            </div>

            <div class="col-4 text_center">
                <h1><?= $beverageCount ?></h1>
                <br>
                Beverages
            </div>
            
            <div class="col-4 text_center">
                <h1><?= $categoryCount ?></h1>
                <br>
                Categotries
            </div>

            <div class="clearfix"></div>

        </div>
    </div> 
    <?php include PATH . 'admin-footer.php'; ?>
</body>
</html>