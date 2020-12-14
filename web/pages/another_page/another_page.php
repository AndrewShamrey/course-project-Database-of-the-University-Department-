<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Состав кафедры</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="another_page.css">
</head>

<?php if(isset($_SESSION['user']) == false): ?>
    <meta http-equiv='refresh' content='0; url=../authorization/connection.php'>
<?php else: ?>

<body>

    <?php
        require_once '../connection_to_db.php';

        $thisPersonShowId = $_POST['show_id'];
        $consultQuery = mysqli_query($auth, "SELECT * FROM `test_with_inc`.`consultation` WHERE `consult_id` = '$thisPersonShowId'");
        $consultQueryUse = mysqli_fetch_assoc($consultQuery);
        $userConsultData = $consultQueryUse['user_text_consult'];
        echo '<p class="consult_data">' . $userConsultData . '</p>';  


        $timeTableQuery = mysqli_query($auth, "SELECT subject_name, subject_day, subject_start, subject_location, group_name_id, speciality_name FROM `test_with_inc`.`timetable` inner join `test_with_inc`.`groups_stud` on group_stud_id = group_number inner join `test_with_inc`.`subjects` on subject_id = subject_name_id WHERE for_prepod = '$thisPersonShowId'");
        while ($tableRow = mysqli_fetch_assoc($timeTableQuery)) {
            $subjectsToTable[] = implode('^^^ ', $tableRow);
        }        
        $subjectsToTableStr = implode(';;',  $subjectsToTable);
        echo '<p class="subj_to_table">' . $subjectsToTableStr . '</p>';

        
        $prepodsQuery = mysqli_query($auth, "SELECT * FROM `test_with_inc`.`prepods` inner join `test_with_inc`.`prepods_job` on job_id = user_id WHERE `user_id` = '$thisPersonShowId'");
        $prepodsArray = mysqli_fetch_assoc($prepodsQuery);
        $prepods_data_final = implode('^^^ ',  $prepodsArray);
        echo '<p class="all_prepods_data">' . $prepods_data_final . '</p>';
    ?>


    <div class="person_container"></div>
    <div class="consultations_container">
        <h3>Консультации:</h3>
        <p class="consultations"></p>
    </div>
    <div class="timetable_container">
        <h3>Расписание:</h3>
        <div class="table_container">
            <table>
                <thead>
                    <th></th>
                    <th>Понедельник</th>
                    <th>Вторник</th>
                    <th>Среда</th>
                    <th>Четверг</th>
                    <th>Пятница</th>
                    <th>Суббота</th>
                </thead>
                <tbody>
                    <tr><td>9:00<br>10:20</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                    <tr><td>10:35<br>11:55</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                    <tr><td>12:25<br>13:45</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                    <tr><td>14:00<br>15:20</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                    <tr><td>15:50<br>17:10</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                    <tr><td>17:25<br>18:45</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                    <tr><td>19:00<br>20:20</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                    <tr><td>20:40<br>22:00</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="another_page.js"></script>
</body>

<?php endif; ?>
</html>