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
    $typeOfDisability = $_POST['deaf'].",".$_POST['intellectualDisability'].",".$_POST['learningDisability'].",".$_POST['mentalDisability'].",".$_POST['physicalDisablity'].",".
    $_POST['psychosocialDisability'].",".$_POST['speechAndLanguageImpairment'].",".$_POST['visualDisability'].",".$_POST['cancer'].",".$_POST['rareDisease'];
    $medicalCondition = $_POST['medicalCondition'];
    $causeOfDisability = $_POST['inborn'].",".$_POST['acquired'];
    $congenitalInborn = $_POST['autism'].",".$_POST['adhd'].",".$_POST['cerebralPalsy'].",".$_POST['downSyndrome'];
    $acquired = $_POST['chronicIllness'].",".$_POST['acquiredCerebralPalsy'].",".$_POST['injury'];
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
    $income = $_POST['income'];
    $categoryOfEmployment = $_POST['categoryOfEmployment'];
    $natureOfEmployment = $_POST['natureOfEmployment'];
    $occupation = $_POST['occupation'];
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
    $philHealthMemberType = $_POST['philHealthMemberType'];
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
