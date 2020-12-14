<?php
    $auth = mysqli_connect('localhost', 'for_connect', 'password', 'test_with_inc');
    if (!$auth) {die('Error connect to DataBase with logins');}