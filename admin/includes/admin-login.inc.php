<?php
    if (isset($_POST['submit'])) {
    $username = $_POST['AUsername'];
    $password = $_POST['APassword'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    loginUser($connection, $username, $password);
    } else {
        header("location: ../index.html");
        exit();
    }
?>