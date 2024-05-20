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
            <h1>Manage Admin</h1>
            <br>


            <a href="<?= ROOT ?>/admins/add_account"  class="btn_primary">Add Admin</a>
            <br /><br />

            <table class="tbl-full">
                <tr>
                    <th>Admin ID</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
                <?php if (is_array($admins) && count($admins) > 0): ?>
                    <?php foreach($admins as $acc): ?>
                        <tr>
                            <td><?= $acc->admin_id ?></td>
                            <td><?= $acc->first_name ?></td>
                            <td><?= $acc->middle_name ?></td>
                            <td><?= $acc->last_name ?></td>
                            <td><?= $acc->username ?></td>
                            <td>
                                <a href="<?= ROOT ?>/admins/edit_account/<?= $acc->admin_id ?>" class="btn_secondary">Edit</a>
                                <a href="<?= ROOT ?>/admins/delete_account/<?= $acc->admin_id ?>" class="btn_danger">Delete</a>
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