<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Помощь</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="help.css">
</head>

<?php if(isset($_SESSION['user']) == false): ?>
    <meta http-equiv='refresh' content='0; url=../authorization/connection.php'>
<?php else: ?>

<body>
    <div class="admin"><h2>ПОМОЩЬ</h2></div>
    <div class="questions"><h2>ЧАСТЫЕ ВОПРОСЫ</h2></div>

    <?php
        require_once '../connection_to_db.php';

        $adminQuery = mysqli_query($auth, "SELECT * FROM `test_with_inc`.`prepods` inner join `test_with_inc`.`prepods_job` on user_id = job_id inner join `test_with_inc`.`authorization` on auth_id = user_id where role_id = 2");
        $adminData = mysqli_fetch_assoc($adminQuery);
        $admin_data = [$adminData['user_id'], $adminData['last_name'], $adminData['first_name'], $adminData['fathers_name'], $adminData['location'], $adminData['phone'], $adminData['email'], $adminData['position_name'], $adminData['ac_degree']];
        $admin_data_str = implode(';;',  $admin_data);    

        echo '<p class="admin_data">' . $admin_data_str . '</p>';
    ?>

    <script src="help.js"></script>
</body>

<?php endif; ?>
</html>