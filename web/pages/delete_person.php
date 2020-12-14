<?php
    session_start();
    // require_once 'connection_to_db.php';
    require_once 'connect_by_role.php';

    $personToDrop = $_POST['delete_person'];
    $deletePersonQuery = mysqli_query($auth, "DELETE FROM `test_with_inc`.`prepods` WHERE user_id = '$personToDrop'");

    header('Location: staff/staff.php', true);
?>