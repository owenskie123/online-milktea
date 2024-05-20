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
            <h1>Manage Orders</h1>
            <br>

            <table class="tbl-full">
                <tr>
                    <th>Order ID</th>
                    <th>Ordered Product</th>
                    <th>Quantity</th>
                    <th>Cost</th>
                    <th>Fullname</th>
                    <th>Actions</th>
                </tr>
                <?php if (is_array($orders) && count($orders) > 0): ?>
                    <?php foreach($orders as $item): ?>
                        <tr>
                            <td><?= $item->order_id ?></td>
                            <td><?= $item->product_name ?></td>
                            <td><?= $item->qty ?></td>
                            <td><?= $item->cost ?></td>
                            <td><?= $item->fullname ?></td>
                            <td>
                                <a href="#" class="btn_secondary">Edit</a>
                                <a href="#" class="btn_danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No Result</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
    <?php include PATH . 'admin-footer.php'; ?>
</body>
</html>