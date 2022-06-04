<?php

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

function insertUser($connection, $firstName, $middleName, $lastName, $username, $email, $password){
    $sql = "INSERT INTO user (first_name, middle_name, last_name, username, email, password) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = $connection->prepare($sql);

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssss", $firstName, $middleName, $lastName, $username, $email, $hashedPassword);
    mysqli_stmt_execute($stmt); 
    mysqli_stmt_close($stmt);
    header("location: ../sign-up.html?error=none&username=".$username);
    exit();
}

function userExists($connection, $firstName, $middleName, $lastName) {
    $sql = "SELECT * FROM user WHERE first_name=? and middle_name=? and last_name=?";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign-up.html?error=stmterror");
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

function usernameExists($connection, $username){
    $sql = "SELECT * FROM user WHERE username=?";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../create-account.html?error=stmterror");
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

function emailExists($connection, $email) { 
    $sql = "SELECT * FROM user WHERE email=?";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../create-account.html?error=stmterror");
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

function loginCredentialsExists($connection, $username, $email) {
    $sql = "SELECT * FROM user WHERE username=? OR email=?";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign-up.html?error=stmterror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
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
    $loginCredentialsExists = loginCredentialsExists($connection, $username, $username);
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
        $_SESSION['username'] = $loginCredentialsExists['username'];
        $_SESSION['email'] = $loginCredentialsExists['email'];
        header("location: ../home.html");
        exit();
    }
}

function insertData($connection, $firstName, $middleName, $lastName, $suffix, $sex, $nationality, $status, $bloodType, $dataOfBirth, $region, $province, $city, $barangay, $street, $address) {
    $sql = "INSERT INTO user_data(FName, MName, LName, suffix, sex, nationality, status, BType, dob, region, province, city, barangay, street, address) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../home.html?error=stmterror");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sssssssssssssss", $firstName, $middleName, $lastName, $suffix, $sex, $nationality, $status, $bloodType, $dataOfBirth, $region, $province, $city, $barangay, $street, $address);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../home.html?error=none");
    exit();
}

function updateData($connection, $username, $q1, $q2o1, $q2o2, $q2o3, 
                $q2o4, $q2o5, $q3, $phoneNumber, $firstName, $middleName,
                $lastName, $gender, $birthday, $race, $type) {
    $sql = "UPDATE user_data SET q1 = ?, q2o1 = ?, q2o2 = ?, q2o3 = ?, q2o4 = ?, q2o5 = ?, q3 = ?, phone = ?, firstName = ?,
     middleName = ?, lastName = ?, gender = ?, birthday = ?, race = ?, raceType = ? WHERE username = ?;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../home.html?error=stmterror");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssssssssssssssss", $q1, $q2o1, $q2o2, $q2o3, 
                $q2o4, $q2o5, $q3, $phoneNumber, $firstName, $middleName,
                $lastName, $gender, $birthday, $race, $type, $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../home.html?error=none");
    exit();
}
