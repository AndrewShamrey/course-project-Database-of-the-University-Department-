<?php session_start();?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Вход</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/icons/favicon.ico">
    <link rel="stylesheet" href="auth.css">
</head>
<body>

<?php if(isset($_SESSION['user'])): ?>
    <meta http-equiv='refresh' content='0; url=../main/index.php'>
<?php else: ?>

    <div class="authorization">
        <form class="auth-form" action="../form_data.php" method="POST">
            <p class="login-title">Войдите чтобы продолжить</p>
            <div class="login-space">
                <input type="text" name="login" id="login" placeholder="Логин" required>
            </div>
            <div class="pass-space">
                <input type="password" name="password" id="password" placeholder="Пароль" required>
            </div>
            <button class="auth-btn" type="submit">Старт</button>
            <?php
            if ($_SESSION['message']) {
                echo '<p class="message"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
            ?>
            <p class="forgot">Забыли пароль? <a class="call_admin" href="tel:+375295361038">Связаться с администратором</a></p>
        </form>    
    </div>
    <?php endif; ?>

</body>
</html>
