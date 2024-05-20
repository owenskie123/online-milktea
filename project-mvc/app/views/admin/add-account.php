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
            <form action="<?= ROOT ?>/admins/insert_account" method="POST">
                <h2>Add Account</h2>
                <fieldset>
                    <legend>Account Details</legend>
                    <?php showErrors($err); ?>
                    <div class="order-label">First Name : </div>
                    <input type="text" name="first_name" value="<?php get_var('first_name'); ?>" placeholder="" class="input-responsive" required>

                    <div class="order-label">Middle Name : </div>
                    <input type="text" name="middle_name" value="<?php get_var('middle_name'); ?>" placeholder="" class="input-responsive">

                    <div class="order-label">Last Name : </div>
                    <input type="text" name="last_name" value="<?php get_var('last_name'); ?>" placeholder="" class="input-responsive" required>

                    <div class="order-label">Username : </div>
                    <input type="text" name="username" value="<?php get_var('username'); ?>" placeholder="" class="input-responsive" required>

                    <div class="order-label">Email : </div>
                    <input type="email" name="email" value="<?php get_var('email'); ?>" placeholder="" class="input-responsive" required>

                    <input type="submit" value="Add Account" class="btn btn-primary">
                </fieldset>
            </form>
        </div>
    </main>
    <?php include PATH . 'admin-footer.php'; ?>
</body>
</html>