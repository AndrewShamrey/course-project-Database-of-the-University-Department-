<?php
    session_start();
    require_once 'connection_to_db.php';
    // require_once 'connect_by_role.php';

    $login = strtolower($_POST['login']);
    $password = md5($_POST['password']);
    $check_user = mysqli_query($auth, "SELECT * FROM `test_with_inc`.`authorization` WHERE `login` = '$login' AND `pass` = '$password'");
    if (mysqli_num_rows($check_user) > 0) {
        $user = mysqli_fetch_assoc($check_user);
        $_SESSION['user'] = [
            "id" => $user['auth_id'],
            "login" => $user['login'],
            "role" => $user['role_id'],
        ];    
        header('Location: main/index.php', true);
    } else {
        $_SESSION['message'] = 'Неверный логин или пароль';
        header('Location: authorization/connection.php');
    }
?>