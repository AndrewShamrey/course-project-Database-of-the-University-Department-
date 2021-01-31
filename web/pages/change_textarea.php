<?php
    session_start();
    // require_once 'connection_to_db.php';
    require_once 'connect_by_role.php';

    $newValue = nl2br($_POST['consultations']);
    $thisPersonConsultId = $_SESSION['user']['id'];
    $changeConsultData = mysqli_query($auth, "UPDATE `test_with_inc`.`consultation` SET user_text_consult = '$newValue' where consult_id = '$thisPersonConsultId'");
    
    header('Location: profile_page/profile_page.php', true);
?>