<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/css/style.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/login.css">
    <title><?= APP_NAME ?></title>
</head>
<body>
    <?php include PATH . 'nav.php'; ?>
    <section class="login-container">
        <form action="<?= ROOT ?>/login/auth" method="POST" class="login-form">
            <h2>Login</h2>
            <hr>
            <?php showErrors($err); ?>
            <div class="login-input">
                <label for="">Username :</label>
                <input type="text" name="username">
                <label for="">Password :</label>
                <input type="password" name="password">
            </div>
            <input type="submit" value="Log In" class="button">
        </form>
    </section>
    <?php include PATH . 'social.php'; ?>
    <?php include PATH . 'footer.php'; ?>
</body>
</html>