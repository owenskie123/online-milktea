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
            <form action="<?= ROOT ?>/admins/update_account" method="POST">
                <h2>Edit Account</h2>
                <fieldset>
                    <legend>Account Details</legend>
                    <?php showErrors($err); ?>
                    <div class="order-label">First Name : </div>
                    <input type="text" name="first_name" value="<?= $admin->first_name ?>" placeholder="" class="input-responsive" required>

                    <div class="order-label">Middle Name : </div>
                    <input type="text" name="middle_name" value="<?= $admin->middle_name ?>" placeholder="" class="input-responsive">

                    <div class="order-label">Last Name : </div>
                    <input type="text" name="last_name" value="<?= $admin->last_name ?>" placeholder="" class="input-responsive" required>

                    <div class="order-label">Username : </div>
                    <input type="text" name="username" value="<?= $admin->username ?>" placeholder="" class="input-responsive" required>

                    <div class="order-label">Email : </div>
                    <input type="email" name="email" value="<?= $admin->email ?>" placeholder="" class="input-responsive" required>

                    <?php if ($admin->admin_id == $_SESSION['user']->admin_id): ?>
                        <div class="order-label">Current Password : </div>
                        <input type="password" id="current-pass" name="current_pass" placeholder="" class="input-responsive">

                        <div class="order-label">New Password : </div>
                        <input type="password" id="password" name="password" placeholder="" class="input-responsive" disabled>

                        <div class="order-label">Confirm Password : </div>
                        <input type="password" id="confirm-pass" name="confirm_pass" placeholder="" class="input-responsive" disabled>
                    <?php endif; ?>

                    <input type="hidden" value="<?= $admin->admin_id ?>" name="admin_id">
                    <input type="submit" value="Update Account" class="btn btn-primary">
                </fieldset>
            </form>
        </div>
    </main>
    <?php include PATH . 'admin-footer.php'; ?>
    <script type="text/javascript" src="<?= ROOT ?>/js/edit-account.js"></script>
</body>
</html>