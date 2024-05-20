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
            <h1>Manage Beverages</h1>
            <br>


            <a href="<?= ROOT ?>/admins/add_beverage"  class="btn_primary">Add Beverage</a>
            <br /><br />

            <table class="tbl-full">
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Actions</th>
                </tr>
                <?php if (is_array($products) && count($products) > 0): ?>
                    <?php foreach($products as $item): ?>
                        <tr>
                            <td><?= $item->product_id ?></td>
                            <td><?= $item->product_name ?></td>
                            <td>₱<?= $item->product_price ?></td>
                            <td>
                                <a href="<?= ROOT ?>/admins/edit_beverage/<?= $item->product_id ?>" class="btn_secondary">Edit</a>
                                <a href="<?= ROOT ?>/admins/delete_beverage/<?= $item->product_id ?>" class="btn_danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">No Result</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
    <?php include PATH . 'admin-footer.php'; ?>
</body>
</html>