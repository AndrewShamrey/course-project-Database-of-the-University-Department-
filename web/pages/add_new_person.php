<?php
    session_start();
    // require_once 'connection_to_db.php';
    require_once 'connect_by_role.php';

    $lastName = $_POST['last_name'];
    $firstName = $_POST['first_name'];
    $fathersName = $_POST['fathers_name'];
    $location = $_POST['location'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $positionName = $_POST['position_name'];
    $acDegree = $_POST['ac_degree'];
    $scienceDir = nl2br($_POST['science_direction']);
    $login = strtolower($_POST['login']);
    $password = md5($_POST['pass']);
    $role = $_POST['role_id'];
    $courses = nl2br($_POST['subj_of_course_id']);
    $subjects = nl2br($_POST['timetable_data']);

    $IdQuery = mysqli_query($auth, "SELECT MAX(user_id) FROM `test_with_inc`.`prepods`");
    $newId = mysqli_fetch_assoc($IdQuery)['MAX(user_id)'] + 1;
    
    $createUser = mysqli_query($auth, "INSERT INTO `test_with_inc`.`prepods` VALUES ('$newId', '$lastName', '$firstName', '$fathersName', '$location', '$phone', '$email')");
    $createUserJob = mysqli_query($auth, "INSERT INTO `test_with_inc`.`prepods_job` VALUES ('$newId', '$positionName', '$acDegree', '$scienceDir')");
    $createUserAuth = mysqli_query($auth, "INSERT INTO `test_with_inc`.`authorization` VALUES ('$newId', '$login', '$password', '$role')");
    $createUserConsult = mysqli_query($auth, "INSERT INTO `test_with_inc`.`consultation` VALUES ('$newId', '')");
 
    $coursesArr = explode(', ', $courses);
    for ($i = 0 ; $i < count($coursesArr) ; $i++) {
        $currentCourseId = mysqli_fetch_assoc(mysqli_query($auth, "SELECT MAX(user_subj_id) FROM `test_with_inc`.`courses`"))['MAX(user_subj_id)'] + 1;
        $createUserAuth = mysqli_query($auth, "INSERT INTO `test_with_inc`.`courses` VALUES ('$currentCourseId', '$newId', '$coursesArr[$i]')");
    }

    $subjectsArr = explode('^^^', $subjects);
    for ($i = 0 ; $i < count($subjectsArr) ; $i++) {
        $currentTimeTableSubj = explode(', ', $subjectsArr[$i]);
        $currentTimeTableId = mysqli_fetch_assoc(mysqli_query($auth, "SELECT MAX(table_id) FROM `test_with_inc`.`timetable`"))['MAX(table_id)'] + 1;
        $queryToGroups = mysqli_query($auth, "SELECT group_stud_id FROM `test_with_inc`.`groups_stud` WHERE group_name_id = $currentTimeTableSubj[4]");
        $queryToGroupsReady = mysqli_fetch_assoc($queryToGroups)['group_stud_id'];                                    
        $currentTimeTableQuery = mysqli_query($auth, "INSERT INTO `test_with_inc`.`timetable` VALUES ('$currentTimeTableId', '$newId', '$currentTimeTableSubj[0]', '$currentTimeTableSubj[2]', '$currentTimeTableSubj[1]', '$currentTimeTableSubj[3]', '$queryToGroupsReady')");
    }
   
    header('Location: staff/staff.php', true);
?>