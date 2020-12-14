<?php
session_start();
if ($_SESSION['user']['role'] == 2) {
    $auth = mysqli_connect('localhost', 'db_admin', 'admin', 'test_with_inc');
    if (!$auth) {die('Error connect to DataBase with logins');}
} elseif ($_SESSION['user']['role'] == 1) {
    $auth = mysqli_connect('localhost', 'super_user', 'super', 'test_with_inc');
    if (!$auth) {die('Error connect to DataBase with logins');}
} else {
    die('Error connect to DataBase with logins');
}