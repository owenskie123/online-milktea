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


            <a href="#"  class="btn_primary">Add Admin</a>
            <br /><br />

            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
                <tr>
                    <td>1.</td>
                    <td>OWEN BRAINE GAMOL  </td>
                    <td>OWEN</td>
                    <td>
                        <a href="#" class="btn_secondary">Update Admin</a>
                        <a href="#" class="btn_danger">Delete Admin</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <?php include PATH . 'admin-footer.php'; ?>
</body>
</html>