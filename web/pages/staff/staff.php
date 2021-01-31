<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Состав кафеды</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="staff.css">
</head>

<?php if(isset($_SESSION['user']) == false): ?>
    <meta http-equiv='refresh' content='0; url=../authorization/connection.php'>
<?php else: ?>

<body>
    <form class="id_to_show_page" action="../another_page/another_page.php" method="POST">
        <textarea name="show_id" id="id_to_show"></textarea>
    </form>
    <form class="delete_person" action="../delete_person.php" method="POST">
        <textarea name="delete_person" id="delete_person"></textarea>
    </form>
    <form class="change_admin_data" action="../change_admin_data.php" method="POST">
        <textarea name="change_admin_data" id="change_admin_data"></textarea>
    </form>

    <?php
        require_once '../connection_to_db.php';

        $prepodsQuery = mysqli_query($auth, "SELECT * FROM `test_with_inc`.`prepods` inner join `test_with_inc`.`prepods_job` on job_id = user_id order by last_name asc");
        while ($row = mysqli_fetch_assoc($prepodsQuery)) {
            $prepodsArray[] = implode('^^^ ', $row);
        }        
        $prepods_data_final = implode(';;',  $prepodsArray);
        echo '<p class="all_prepods_data">' . $prepods_data_final . '</p>';


        $queryForArrId = mysqli_query($auth, "SELECT user_id FROM `test_with_inc`.`prepods` order by last_name asc");
        while ($idRow = mysqli_fetch_assoc($queryForArrId)) {
            $prepodsIdArray[] = implode(', ', $idRow);
        }                

        $countOfPrepods = mysqli_num_rows($prepodsQuery);
        for ($i = 0 ; $i < $countOfPrepods ; $i++) {
            $prepodsCoursesQuery = mysqli_query($auth, "SELECT subject_name FROM `test_with_inc`.`prepods` inner join `test_with_inc`.`courses` on user_id = for_user_id inner join `test_with_inc`.`subjects` on subject_name_id = subject_of_course_id WHERE `user_id` = '$prepodsIdArray[$i]' ORDER BY subject_name DESC");
            while ($rowCourses = mysqli_fetch_assoc($prepodsCoursesQuery)) {
                $currentArray[] = implode($rowCourses);
            }        
            if (isset($currentArray)) $currentSubjArr = implode(';;',  $currentArray);
            unset($currentArray);
            echo '<p class="course_of_id">' . $currentSubjArr . '</p>';
        }

        echo '<p class="role_from_db">' . $_SESSION['user']['role'] . '</p>';
    ?>

    <div class="staff"><h2>СОСТАВ КАФЕДРЫ</h2></div>
    <div class="department_info">
        <h3>Расположение кафедры и контактная информация</h3>
        <p class="locations">
            Ауд. 410-1 − Заведующий кафедрой, т. 86-01, 293-86-01<br>
            Ауд. 403-1 − Заведующий учебными лабораториями, т. 88-85, 293-88-85<br>
            Ауд. 412-1 − Ученый секретарь кафедры, 88-63, 293-88-63<br>
            Ауд. 412-1 − Секретарь кафедры (ответственный за делопроизводство), т. 20-88, 293-20-88<br>
            Ауд. 412-1 − Преподавательская, т. 20-88, 293-20-88 или 88-63, 293-88-63<br>
            Ауд. 415а-1 - Преподавательская и аспирантская, т. 20-80, 293-20-80<br>
            Ауд. 404-1 − Учебно-исследовательская лаборатория «Моделирование и компьютерный анализ электронных систем», т. 20-80, 293-20-80<br>
            Ауд. 405-1 − Учебно-научный центр мобильных технологий «Android Software Center», т. 22-37, 293-22-37<br>
            Ауд. 408-1 − Учебно-исследовательский центр «INTES БГУИР», т. 20-81, 293-20-81<br>
            Ауд. 413-1 − Учебно-исследовательская лаборатория «Микропроцессорные системы», т. 89-37, 293-89-37<br>
            Ауд. 415-1 − Учебно-исследовательская лаборатория «Совершенные системы», т. 20-87, 293-20-87<br>
            Ауд. 37-1 − Учебно-исследовательская лаборатория «Теоретические основы проектирования и надёжности электронных систем», т. 88-38, 293-88-38
        </p>
        <div class="contacts">
            <p><a href="tel:+375172932088"><i class="material-icons">call</i>+375-17-293-20-88</a></p>
            <p><a href="https://goo.gl/maps/hkSMjA71VEdF8AD1A"><i class="material-icons">location_on</i>220013, г. Минск, ул. П.Бровки, 6</a></p>
            <p><a href="mailto:kafpiks@bsuir.by"><i class="material-icons">alternate_email</i>kafpiks@bsuir.by</a></p>
        </div>
    </div>

    <div id="my_modal" class="modal">
        <div class="secret_window">
            <p class="close_btn"><span class="material-icons">clear</span></p>
            <h3>Добавить сотрудника</h3>
            <form name="add_admin_person" method="POST" action="../add_new_person.php">
                <div class="fio">
                    <input name="last_name" type="text" placeholder="Фамилия" maxlength="45" pattern="^[a-zA-ZА-Яа-яЁё]+$" required>
                    <input name="first_name" type="text" placeholder="Имя" maxlength="45" pattern="^[a-zA-ZА-Яа-яЁё]+$" required>
                    <input name="fathers_name" type="text" placeholder="Отчество" maxlength="50" pattern="^[a-zA-ZА-Яа-яЁё]+$" required>
                </div>
                <div class="personal_data">
                    <input name="location" type="text" placeholder="Кабинет" maxlength="10" required>
                    <input name="phone" type="tel" placeholder="Телефон" maxlength="30" pattern="\+\d{9,20}" required>
                    <input name="email" type="text" placeholder="Почта" maxlength="50" pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$" required>
                </div> 
                <div class="job_data">
                    <input name="position_name" type="text" placeholder="Должность" maxlength="45" required>
                    <input name="ac_degree" type="text" placeholder="Ученая степень" required>
                </div>
                <textarea name="science_direction" placeholder="Направление научной деятельности" required></textarea>
                <div class="secret_data">
                    <input name="login" type="text" placeholder="Логин" maxlength="45" pattern="^[A-Za-z0-9]+$" required>
                    <input name="pass" type="password" placeholder="Пароль" maxlength="32" pattern="^[A-Za-z0-9]+$" required>
                </div>
                <div class="selects_data">
                    <div class="role_container">
                        <p>Роль пользователя</p>
                        <select name="role_id" size="1" >
                            <option value="1" selected="selected">Сотрудник</option>
                            <option value="2">Администратор</option>
                        </select>
                    </div> 
                    <div class="courses_container">
                        <p>Читаемые курсы</p>
                        <p class="select_courses">
                            1 - Высшая математика <br>2 - Интеллектуальные интернет-технологии <br>3 - Алгоритмы компьютерной графики <br>
                            4 - Вычислительные методы и компьютерная алгебра <br>5 - Информационные технологии <br>6 - Контроль и диагностика средств вычислительной техники <br>
                            7 - Информационное обеспечение систем управления <br>8 - Математический анализ <br>9 - Компьютерные системы и сети <br>
                            10 - Метрология и физические основы измерений <br>11 - Логические основы интеллектуальных систем <br>12 - Микропроцессорные средства и системы <br>
                            13 - Нейросетевые модели и нейрокомпьютеры <br>14 - Микроэлектронные устройства <br>15 - Основы автоматизированного управления <br>
                            16 - Методы численного анализа <br>17 - Основы информатики и программирования <br>18 - Теория электрических цепей <br>
                            19 - Объектно-ориентированное программирование <br>20 - Направляющие системы телекоммуникаций
                        </p>
                        <textarea name="subj_of_course_id" maxlength="20" placeholder="Номера предметов 1, 2, 3" required></textarea>
                    </div> 
                </div>
                <textarea name="timetable_data" placeholder="предмет, день недели, пара, кабинет, группа: *12345/6, *13451/2, *14351/2, *16761/2, *23331/2, *29871/2^^^" required></textarea>
                <button type="submit" class="add_person_button"><p>Добавить</p></button>
            </form>
        </div>
    </div>

    <script src="staff.js"></script>
</body>

<?php endif; ?>
</html>