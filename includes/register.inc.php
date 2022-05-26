<?php

if (isset($_POST['register'])) {
    session_start();
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    $firstName = $_POST['FName'];
    $middleName = $_POST['MName'];
    $lastName = $_POST['LName'];
    $suffix = $_POST['suffix'];
    $sex = $_POST['sex'];
    $nationality = $_POST['nationality'];
    $status = $_POST['status'];
    $bloodType = $_POST['BType'];
    $dataOfBirth = $_POST['dob'];
    $region = $_POST['region'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $barangay = $_POST['barangay'];
    $street = $_POST['street'];
    $address = $_POST['address'];

    insertData($connection, $firstName, $middleName, $lastName, $suffix, $sex, $nationality, $status, $bloodType, $dataOfBirth, $region, $province, $city, $barangay, $street, $address);

} else {
    header("location: ../home.html");
    exit();
}
