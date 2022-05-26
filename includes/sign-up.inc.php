<?php
    if (isset($_POST['submit'])) {
    $username = $_POST['SUsername'];
    $email = $_POST["SEmail"];
    $password = $_POST["SPassword"];
    $confirmPassword = $_POST["SConfirmPassword"];
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (invalidEmail($email) !== false) {
        header("location: ../sign-up.html?error=invalidemail");
        exit();
    }
    if (usernameExists($connection, $username, $email) !== false) {
        header("location: ../sign-up.html?error=usernametaken");
        exit();
    }
    if (passwordMatch($password, $confirmPassword) !== false) {
        header("location: ../sign-up.html?error=passwordnotmatch");
        exit();
    }
    insertUser($connection, $username, $email, $password);
    
}
    else {
        header("location: ../sign-up.html");
        exit();
    }
?>