<?php

if (isset($_POST['pwd-register'])) {
    session_start();
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    $username = $_SESSION['username'];
    $registrationType = $_POST['idType'];
    $pwdNumber = "0434280".$_POST['pwdNumber1'].$_POST['pwdNumber2'];
    $dateApplied = date('Y-m-d', strtotime($_POST['dateApplied']));
    $pwdLastName = $_SESSION['last_name'];
    $pwdFirstName = $_SESSION['first_name'];
    $pwdMiddleName = $_SESSION['middle_name'];
    $pwdSuffix = $_SESSION['suffix'];
    if (isset($_POST['typeOfDisability'])) {
        $str = $_POST['typeOfDisability'];
        $typeOfDisability = implode (",", $str);
    } else {
        $typeOfDisability = "";
    }
    $medicalCondition = $_POST['medicalCondition'];
    if (isset($_POST['causeOfDisability'])) {
        $str = $_POST['causeOfDisability'];
        $causeOfDisability = implode (",", $str);
    } else {
        $causeOfDisability = "";
    }
    if (isset($_POST['congenital'])) {
        $str = $_POST['congenital'];
        $congenitalInborn = implode (",", $str);
    } else {
        $congenitalInborn = "";
    }
    if (isset($_POST['acquired'])) {
        $str = $_POST['acquired'];
        $acquired = implode (",", $str);
    } else {
        $acquired = "";
    }
    $statusOfDisability = $_POST['statusOfDisability'];
    $address = $_POST['address'];
    $barangay = $_POST['barangay'];
    $landline = $_POST['landline'];
    $mobileNumber = $_POST['mobileNumber'];
    $email = $_SESSION['email'];
    $dateOfBirth = date('Y-m-d', strtotime($_POST['dob']));
    $sex = $_POST['sex'];
    $religion = $_POST['religion'];
    $civilStatus = $_POST['civilStatus'];
    $educationalAttainment = $_POST['educationalAttainment'];
    $isVoter = $_POST['isVoter'];
    $employmentStatus = $_POST['employmentStatus'];
    if (isset($_POST['income'])) {
        $str = $_POST['income'];
        $income = implode (",", $str);
    } else {
        $income = "";
    }
    if (isset($_POST['categoryOfEmployment'])) {
        $str = $_POST['categoryOfEmployment'];
        $categoryOfEmployment = implode (",", $str);
    } else {
        $categoryOfEmployment = "";
    }
    if (isset($_POST['natureOfEmployment'])) {
        $str = $_POST['natureOfEmployment'];
        $natureOfEmployment = implode (",", $str);
    } else {
        $natureOfEmployment = "";
    }
    if (isset($_POST['occupation'])) {
        $str = $_POST['occupation'];
        $occupation = implode (",", $str);
    } else {
        $occupation = "";
    }
    $otherOccupation = $_POST['otherOccupation'];
    $is4PsBeneficiary = $_POST['4psBeneficiary'];
    $bloodType = $_POST['bloodType'];
    $organizationAffiliated = $_POST['organization'];
    $contactPerson = $_POST['contactPerson'];
    $officeAddress = $_POST['officeAddress'];
    $telNumber = $_POST['telNumber'];
    $sssNumber = $_POST['sssNumber'];
    $gsisNumber = $_POST['gsisNumber'];
    $psnNumber = $_POST['psnNumber'];
    $philHealthNumber = $_POST['philHealthNumber'];
    if (isset($_POST['philHealthMemberType'])) {
        $str = $_POST['philHealthMemberType'];
        $philHealthMemberType = implode (",", $str);
    } else {
        $philHealthMemberType = "";
    }
    $fatherLastName = $_POST['fatherLastName'];
    $fatherFirstName = $_POST['fatherFirstName'];
    $fatherMiddleName = $_POST['fatherMiddleName'];
    $motherLastName = $_POST['motherLastName'];
    $motherFirstName = $_POST['motherFirstName'];
    $motherMiddleName = $_POST['motherMiddleName'];
    $guardianLastName = $_POST['guardianLastName'];
    $guardianFirstName = $_POST['guardianFirstName'];
    $guardianMiddleName = $_POST['guardianMiddleName'];
    $guardianRelationship = $_POST['guardianRelationship'];
    $guardianContactNumber = $_POST['guadianContactNumber'];
    $accomplishedBy = $_POST['accomplishedBy'];
    $nameOfAccomplisher = $_POST['nameOfAccomplisher'];
    $nameOfPhysician = $_POST['nameOfPhysician'];
    $licenseNumber = $_POST['licenseNumber'];

    insertPWDData($connection, $username, $registrationType, $pwdNumber, $dateApplied, $pwdLastName, $pwdFirstName, $pwdMiddleName, $pwdSuffix, $typeOfDisability, $medicalCondition,
                $causeOfDisability, $congenitalInborn, $acquired, $statusOfDisability, $address, $barangay, $landline, $mobileNumber, $email, $dateOfBirth, $sex, $religion, $civilStatus,
                $educationalAttainment, $isVoter, $employmentStatus, $income, $categoryOfEmployment, $natureOfEmployment, $occupation, $otherOccupation, $is4PsBeneficiary, $bloodType,
                $organizationAffiliated, $contactPerson, $officeAddress, $telNumber, $sssNumber, $gsisNumber, $psnNumber, $philHealthNumber, $philHealthMemberType, $fatherLastName, 
                $fatherFirstName, $fatherMiddleName, $motherLastName, $motherFirstName, $motherMiddleName, $guardianLastName, $guardianFirstName, $guardianMiddleName, $guardianRelationship,
                $guardianContactNumber, $accomplishedBy, $nameOfAccomplisher, $nameOfPhysician, $licenseNumber);

} else if(isset($_POST['senior-citizen-register'])) {
    session_start();
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $username = $_SESSION['username'];

} else if(isset($_POST['solo-parent-register'])) {
    session_start();
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    $username = $_SESSION['username'];

} else {
    header("location: ../home.html");
    exit();
}
