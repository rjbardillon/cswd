<?php
    if (isset($_POST['submit'])) {
        $lastName = $_POST['SLastName'];
        $middleName = $_POST['SMiddleName'];
        $firstName = $_POST['SFirstName'];
        $email = $_POST["SEmail"];
        $password = $_POST["SPassword"];
        $confirmPassword = $_POST["SConfirmPassword"];
        $currentUsername = str_replace(" ", "", strtolower($firstName[0].$middleName[0].$lastName));
        $username = $currentUsername;
        $i = 0;

        if (isset($_POST['g-recaptcha-response'])) {
            $recaptcha = $_POST['g-recaptcha-response'];
            if (!$recaptcha) {
                header("location: ../sign-up.html?error=wrongcaptcha");
                exit();
            }
        }
    
        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        while (usernameExists($connection, $currentUsername, $email) !== false) {
            $i++;
            $currentUsername = "";
            $currentUsername = $username.$i;
        }
        if (userExists($connection, $firstName, $middleName, $lastName) !== false) {
            header("location: ../sign-up.html?error=userexists");
            exit();
        }
        if (invalidEmail($email) !== false) {
            header("location: ../sign-up.html?error=invalidemail");
            exit();
        }
        if (emailExists($connection, $currentUsername, $email) !== false) {
            header("location: ../sign-up.html?error=emailtaken");
            exit();
        }
        if (passwordMatch($password, $confirmPassword) !== false) {
            header("location: ../sign-up.html?error=passwordnotmatch");
            exit();
        }
        insertUser($connection, $firstName, $middleName, $lastName, $currentUsername, $email, $password);
    
    }
    else {
        header("location: ../sign-up.html");
        exit();
    }
?>