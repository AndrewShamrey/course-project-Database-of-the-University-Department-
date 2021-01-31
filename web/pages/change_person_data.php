<?php
    session_start();
    // require_once 'connection_to_db.php';
    require_once 'connect_by_role.php';

    $thisPersonId = $_SESSION['user']['id'];
    $newPersonData = explode(', ', $_POST['change_data']);
    $changePersonLocation = mysqli_query($auth, "UPDATE `test_with_inc`.`prepods` SET location = '$newPersonData[0]' where user_id = '$thisPersonId'");
    $changePersonPhone = mysqli_query($auth, "UPDATE `test_with_inc`.`prepods` SET phone = '$newPersonData[1]' where user_id = '$thisPersonId'");
    $changePersonEmail = mysqli_query($auth, "UPDATE `test_with_inc`.`prepods` SET email = '$newPersonData[2]' where user_id = '$thisPersonId'");
    
    header('Location: main/index.php');
?>