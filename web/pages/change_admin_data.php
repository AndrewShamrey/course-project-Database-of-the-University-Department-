<?php
    session_start();
    // require_once 'connection_to_db.php';
    require_once 'connect_by_role.php';

    $newPersonData = explode('^^', $_POST['change_admin_data']);

    $thisPersonId = $newPersonData[9];

    $changePersonLastName = mysqli_query($auth, "UPDATE `test_with_inc`.`prepods` SET last_name = '$newPersonData[0]' where user_id = '$thisPersonId'");
    $changePersonFirstName = mysqli_query($auth, "UPDATE `test_with_inc`.`prepods` SET first_name = '$newPersonData[1]' where user_id = '$thisPersonId'");
    $changePersonFathersName = mysqli_query($auth, "UPDATE `test_with_inc`.`prepods` SET fathers_name = '$newPersonData[2]' where user_id = '$thisPersonId'");
    $changePersonPositionName = mysqli_query($auth, "UPDATE `test_with_inc`.`prepods_job` SET position_name = '$newPersonData[3]' where job_id = '$thisPersonId'");
    $changePersonAcDegree = mysqli_query($auth, "UPDATE `test_with_inc`.`prepods_job` SET ac_degree = '$newPersonData[4]' where job_id = '$thisPersonId'");
    $changePersonLocation = mysqli_query($auth, "UPDATE `test_with_inc`.`prepods` SET location = '$newPersonData[5]' where user_id = '$thisPersonId'");
    $changePersonPhone = mysqli_query($auth, "UPDATE `test_with_inc`.`prepods` SET phone = '$newPersonData[6]' where user_id = '$thisPersonId'");
    $changePersonEmail = mysqli_query($auth, "UPDATE `test_with_inc`.`prepods` SET email = '$newPersonData[7]' where user_id = '$thisPersonId'");
    $changePersonScience = mysqli_query($auth, "UPDATE `test_with_inc`.`prepods_job` SET science_direction = '$newPersonData[8]' where job_id = '$thisPersonId'");

    if ($newPersonData[10] != '') {
        $logAndPassArr = explode(' - ', $newPersonData[10]);
        $currentNewPass = md5($logAndPassArr[1]);
        $changePersonLogin = mysqli_query($auth, "UPDATE `test_with_inc`.`authorization` SET login = '$logAndPassArr[0]' where auth_id = '$thisPersonId'");
        $changePersonPass = mysqli_query($auth, "UPDATE `test_with_inc`.`authorization` SET pass = '$currentNewPass' where auth_id = '$thisPersonId'");
    }

    header('Location: staff/staff.php', true);
?>