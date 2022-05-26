<?php

if (isset($_POST['submit'])) {
    $username = $_POST['UUsername'];
    $password = $_POST['UPassword'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    loginUser($connection, $username, $password);
}
else {
    header("location: ../login.html");
    exit();
}