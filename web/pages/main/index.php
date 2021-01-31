<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Кафедра</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/icons/favicon.ico">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
</head>

<?php if(isset($_SESSION['user']) == false): ?>
    <meta http-equiv='refresh' content='0; url=../authorization/connection.php'>
<?php else: ?>

<body>
    <header class="header">
        <div class="container">
            <div class="wrapper">
                <div class="header_content">
                    <div class="left_content">
                        <img src="../../assets/icons/logo_colp.png" alt="logo" class="header_logo_img">
                    </div>
                    <div class="logo_name">
                        <h1 class="logo_name_title">КАФЕДРА</h1>
                        <p class="logo_name_subtitle">Университета</p>
                    </div>
                    <div class="right_content">
                        <div class="user_photo_inHead">
                            <img src="../../assets/icons/user_default_ico_inhead.jpg" alt="user_photo">
                        </div>
                        <i class="material-icons" title="Выйти" onclick="location.href='../logout.php'">login</i>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?php
        require_once '../connection_to_db.php';

        $this_person_id = $_SESSION['user']['id'];
        $new_query = mysqli_query($auth, "SELECT * FROM `test_with_inc`.`authorization` inner join `test_with_inc`.`prepods` on user_id = auth_id inner join `test_with_inc`.`prepods_job` on job_id = user_id inner join `test_with_inc`.`consultation` on consult_id = user_id WHERE `user_id` = '$this_person_id'");
        $userQuery = mysqli_fetch_assoc($new_query);

        $user_data = [$userQuery['user_id'], $userQuery['login'], $userQuery['role_id'], $userQuery['last_name'], $userQuery['first_name'], $userQuery['fathers_name'], $userQuery['location'], $userQuery['phone'], $userQuery['email'], $userQuery['position_name'], $userQuery['ac_degree'], $userQuery['science_direction']];
        $user_data_str = implode(';;',  $user_data);
        echo '<p class="user_data">' . $user_data_str . '</p>';
        

        $subjQuery = mysqli_query($auth, "SELECT subject_name FROM `test_with_inc`.`prepods` inner join `test_with_inc`.`courses` on user_id = for_user_id inner join `test_with_inc`.`subjects` on subject_name_id = subject_of_course_id WHERE `user_id` = '$this_person_id'");
        while ($row = mysqli_fetch_assoc($subjQuery)) {
            $array[] = implode($row);
        }        
        $subj_data_final = implode(';;',  $array);
        echo '<p class="subj_data">' . $subj_data_final . '</p>';
    ?>

    <main>
        <form class="change_person_data" action="../change_person_data.php" method="POST">
            <textarea name="change_data" id="person_data_to_post"></textarea>
        </form>
        <div class="content_wrap">
            <div class="left_main">
                <div class="wrapper_left">
                    <img class="user_photo" src="../../assets/icons/user_default_ico_inhead.jpg" alt="photo">
                    <div class="info_container">
                        <p class="user_name"><span>Иванов </span><span>Иван</span></p>
                        <p class="user_father_name">Иванович</p>
                        <p class="job"><span>Преподаватель</span>, <span>канд.техн.наук, доцент</span></p>
                        <details>
                            <summary>
                                <p>подробнее</p>    
                            </summary>
                            <div class="addition_information">
                                <p><span>Аудитория: </span><span>410-1</span></p>
                                <p><span>Телефон: </span><span>+375123456789</span></p>
                                <p><span>E-mail: </span><span>ivanovivan@gmail.com</span></p>
                                <hr>
                                <p>
                                    <span>Читаемые курсы: </span>
                                    <ul>
                                        <li>«Методы и средства защиты информации»</li>
                                        <li>«Современные технологии приборостроения»</li>
                                        <li>«Надёжность технических систем»</li>
                                    </ul>
                                </p>
                                <hr>
                                <p>
                                    <span>Направление научной деятельности: </span>
                                    <br><span>Организация учебного и научно-исследовательского процессов в техническом университете</span>
                                </p>
                                <p class="change">редактировать</p>
                            </div>
                        </details>
                    </div>
                </div>
            </div>
            <div class="right_main">
                <nav class="main_nav">
                    <ul class="menu">
                        <li class="active"><a href="index.html" onclick="return false">Моя страница</a></li>
                        <li><a href="" onclick="return false">Состав</a></li>
                        <li><a href="" onclick="return false">История</a></li>
                        <li><a href="https://drive.google.com/drive/folders/1Ve4xZ-B4jteKBNyBqkAFoUIHyTSiHQWo?usp=sharing" target="_blank">Документы</a></li>
                    </ul>
                </nav>
                <div class="page_content"></div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="wrapper">
                <div class="footer_content">
                    <p>Помощь</p>
                    <img src="../../assets/icons/logo_colp.png" alt="logo">
                    <p>Возможности</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="index.js"></script>
</body>

<?php endif; ?>
</html>