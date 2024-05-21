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

            <a href="<?= ROOT ?>/admins/orders"  class="btn_primary">Refresh</a>
            <br /><br />

            <table class="tbl-full">
                <tr>
                    <th>Order ID</th>
                    <th>Ordered Product</th>
                    <th>Quantity</th>
                    <th>Cost</th>
                    <th>Fullname</th>
                    <th>Status</th>
                    <th>Is Paid</th>
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
                            <td><?= ucfirst($item->status) ?></td>
                            <td><?= boolval($item->is_paid) == true ? 'Paid' : 'Unpaid' ?></td>
                            <td>
                                <a href="<?= ROOT ?>/admins/view_order/<?= $item->order_id ?>" class="btn_secondary">View</a>
                                <?php if ($item->status == 'new'): ?>
                                    <a href="<?= ROOT ?>/admins/prepare_order/<?= $item->order_id ?>" class="btn_primary">Prepare</a>
                                <?php elseif ($item->status == 'preparing'): ?>
                                    <a href="<?= ROOT ?>/admins/ready_for_pickup/<?= $item->order_id ?>" class="btn_primary">Ready for Pickup</a>
                                <?php elseif ($item->status == 'ready for pickup'): ?>
                                    <a href="<?= ROOT ?>/admins/delivering/<?= $item->order_id ?>" class="btn_primary">Delivering</a>
                                <?php elseif ($item->status == 'delivering'): ?>
                                    <a href="<?= ROOT ?>/admins/delivered/<?= $item->order_id ?>" class="btn_primary">Delivered</a>
                                <?php endif; ?>

                                <?php if(boolval($item->is_paid) == false): ?>
                                    <a href="<?= ROOT ?>/admins/order_paid/<?= $item->order_id ?>" class="btn_primary">Mark as Paid</a>
                                <?php elseif (boolval($item->is_paid) == true): ?>
                                    <a href="<?= ROOT ?>/admins/order_unpaid/<?= $item->order_id ?>" class="btn_primary">Mark as Unpaid</a>
                                <?php endif; ?>
                                <a href="<?= ROOT ?>/admins/delete_order/<?= $item->order_id ?>" class="btn_danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No Result</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
    <?php include PATH . 'admin-footer.php'; ?>
</body>
</html>