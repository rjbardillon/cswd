<?php
    if (isset($_POST['submit'])) {
        $lastName = $_POST['SLastName'];
        $suffix = $_POST['SSuffix'];
        $middleName = $_POST['SMiddleName'];
        $firstName = $_POST['SFirstName'];
        $adminType = $_POST['admin-type'];
        $barangay = $_POST['barangay'];
        $email = $_POST["SEmail"];
        $password = $_POST["SPassword"];
        $confirmPassword = $_POST["SConfirmPassword"];
        $currentUsername = str_replace(" ", "", strtolower($firstName[0].$middleName[0].$lastName.$suffix));
        $username = $currentUsername;
        $i = 0;

        if (isset($_POST['g-recaptcha-response'])) {
            $recaptcha = $_POST['g-recaptcha-response'];
            if (!$recaptcha) {
                header("location: ../admin-add-administrator.html?error=wrongcaptcha");
                exit();
            }
        }
    
        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        while (usernameExists($connection, $currentUsername) !== false) {
            $i++;
            $currentUsername = "";
            $currentUsername = $username.$i;
        }
        if (userExists($connection, $firstName, $middleName, $lastName) !== false) {
            header("location: ../admin-add-administrator.html?error=userexists");
            exit();
        }
        if (invalidEmail($email) !== false) {
            header("location: ../admin-add-administrator.html?error=invalidemail");
            exit();
        }
        if (emailExists($connection, $email) !== false) {
            header("location: ../admin-add-administrator.html?error=emailtaken");
            exit();
        }
        if (passwordMatch($password, $confirmPassword) !== false) {
            header("location: ../admin-add-administrator.html?error=passwordnotmatch");
            exit();
        }
        insertAdmin($connection, $firstName, $middleName, $lastName, $suffix, $adminType, $barangay, $currentUsername, $email, $password);
    
    }
    else {
        header("location: ../admin-add-administrator.html");
        exit();
    }
?>