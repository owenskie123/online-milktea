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
            <h1>Manage Categories</h1>
            <br>


            <a href="<?= ROOT ?>/admins/add_category"  class="btn_primary">Add Category</a>
            <br /><br />

            <table class="tbl-full">
                <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
                <?php if (is_array($categories) && count($categories) > 0): ?>
                    <?php foreach($categories as $item): ?>
                        <tr>
                            <td><?= $item->category_id ?></td>
                            <td><?= $item->category_name ?></td>
                            <td>
                                <a href="<?= ROOT ?>/admins/edit_category/<?= $item->category_id ?>" class="btn_secondary">Edit</a>
                                <a href="<?= ROOT ?>/admins/delete_category/<?= $item->category_id ?>" class="btn_danger">Delete</a>
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