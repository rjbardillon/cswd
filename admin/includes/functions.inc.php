<?php

function loginCredentialsExists($connection, $username) {
    $sql = "SELECT * FROM administrator WHERE username=?";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign-up.html?error=stmterror");
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

    if ($loginCredentialsExists['password'] !== $password) {
        header("location: ../index.html?error=wrongpassword");
        exit();
    }
    else {
        session_start();
        $_SESSION['admin-username'] = $loginCredentialsExists['username'];
        $_SESSION['first_name'] = $loginCredentialsExists['first_name'];
        $_SESSION['middle_name'] = $loginCredentialsExists['middle_name'];
        $_SESSION['last_name'] = $loginCredentialsExists['last_name'];
        $_SESSION['suffix'] = $loginCredentialsExists['suffix'];
        $_SESSION['name'] = $loginCredentialsExists['first_name']." ".$loginCredentialsExists['middle_name']." ".$loginCredentialsExists['last_name'];
        header("location: ../admin-dashboard.html");
        exit();
    }
}
