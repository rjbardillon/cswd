<?php

function usernameExists($connection, $username){
    $sql = "SELECT * FROM administrator WHERE username=?";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../admin-add-administrator.html?error=stmterror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    } 
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function userExists($connection, $firstName, $middleName, $lastName) {
    $sql = "SELECT * FROM administrator WHERE first_name=? and middle_name=? and last_name=?";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../admin-add-administrator.html?error=stmterror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $firstName, $middleName, $lastName);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        return true;
    } 
    else {
        return false;
    }
    mysqli_stmt_close($stmt);
}

function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function emailExists($connection, $email) { 
    $sql = "SELECT * FROM administrator WHERE email=?";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../admin-add-administrator.html?error=stmterror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    } 
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function passwordMatch($password, $confirmPassword) {
    $result;
    if ($password !== $confirmPassword) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginCredentialsExists($connection, $username) {
    $sql = "SELECT * FROM administrator WHERE username=?";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../admin-add-administrator.html?error=stmterror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    } 
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function loginUser($connection, $username, $password){
    $loginCredentialsExists = loginCredentialsExists($connection, $username);
    if ($loginCredentialsExists === false) {
        header("location: ../index.html?error=wrongaccount");
        exit();
    }
    $passwordhashed = $loginCredentialsExists['password'];
    $checkPassword = password_verify($password, $passwordhashed);

    if ($checkPassword === false) {
        header("location: ../index.html?error=wrongpassword");
        exit();
    }
    else if($checkPassword === true) {
        session_start();
        $_SESSION['admin-username'] = $loginCredentialsExists['username'];
        $_SESSION['first_name'] = $loginCredentialsExists['first_name'];
        $_SESSION['middle_name'] = $loginCredentialsExists['middle_name'];
        $_SESSION['last_name'] = $loginCredentialsExists['last_name'];
        $_SESSION['suffix'] = $loginCredentialsExists['suffix'];
        $_SESSION['admin-name'] = $loginCredentialsExists['first_name']." ".$loginCredentialsExists['middle_name']." ".$loginCredentialsExists['last_name'];
        $_SESSION['admin-type'] = $loginCredentialsExists['admin_type'];
        $_SESSION['barangay'] = $loginCredentialsExists['barangay'];
        header("location: ../admin-dashboard.html");
        exit();
    }
}

function insertAdmin($connection, $firstName, $middleName, $lastName, $suffix, $adminType, $barangay, $username, $email, $password){
    $sql = "INSERT INTO administrator (admin_type, barangay, username, first_name, middle_name, last_name, suffix, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = $connection->prepare($sql);

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssssss", $adminType, $barangay, $username, $firstName, $middleName, $lastName, $suffix, $email, $hashedPassword);
    mysqli_stmt_execute($stmt); 
    mysqli_stmt_close($stmt);
    header("location: ../index.html?error=none&username=".$username);
    exit();
}