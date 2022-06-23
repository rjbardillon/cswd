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

function insertUser($connection, $firstName, $middleName, $lastName, $suffix, $username, $email, $password){
    $sql = "INSERT INTO user (username, last_name, suffix, first_name, middle_name, email, password) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = $connection->prepare($sql);

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssss", $username, $lastName, $suffix, $firstName, $middleName, $email, $hashedPassword);
    mysqli_stmt_execute($stmt); 
    mysqli_stmt_close($stmt);
    header("location: ../index.html?error=none&username=".$username);
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
        $_SESSION['first_name'] = $loginCredentialsExists['first_name'];
        $_SESSION['middle_name'] = $loginCredentialsExists['middle_name'];
        $_SESSION['last_name'] = $loginCredentialsExists['last_name'];
        $_SESSION['suffix'] = $loginCredentialsExists['suffix'];
        $_SESSION['name'] = $loginCredentialsExists['first_name']." ".$loginCredentialsExists['middle_name']." ".$loginCredentialsExists['last_name'];
        header("location: ../home.html");
        exit();
    }
}

function insertPWDData($connection, $username, $registrationType, $pwdNumber, $dateApplied, $pwdLastName, $pwdFirstName, $pwdMiddleName, $pwdSuffix, $typeOfDisability, $medicalCondition,
                $causeOfDisability, $congenitalInborn, $acquired, $statusOfDisability, $address, $barangay, $landline, $mobileNumber, $email, $dateOfBirth, $sex, $religion, $civilStatus,
                $educationalAttainment, $isVoter, $employmentStatus, $income, $categoryOfEmployment, $natureOfEmployment, $occupation, $otherOccupation, $is4PsBeneficiary, $bloodType,
                $organizationAffiliated, $contactPerson, $officeAddress, $telNumber, $sssNumber, $gsisNumber, $psnNumber, $philHealthNumber, $philHealthMemberType, $fatherLastName, 
                $fatherFirstName, $fatherMiddleName, $motherLastName, $motherFirstName, $motherMiddleName, $guardianLastName, $guardianFirstName, $guardianMiddleName, $guardianRelationship,
                $guardianContactNumber, $accomplishedBy, $nameOfAccomplisher, $nameOfPhysician, $licenseNumber) {
    $sql = "INSERT INTO pwd_data(username, registration_type, pwd_number, date_applied, pwd_last_name, pwd_first_name, pwd_middle_name, pwd_suffix, 
    type_of_disability, medical_condition, cause_of_disability, congenital_inborn, acquired, status_of_disability, houseno_street_subdivision_address, barangay, 
    landline, mobile_number, email, date_of_birth, sex, religion, civil_status, educational_attainment, is_voter, 
    employment_status, income, category_of_employment, nature_of_employment, occupation, other_occupation, is_4ps_beneficiary, blood_type, organization_affiliated, 
    contact_person, office_address, office_telephone_number, sss_number, gsis_number, psn_number, philhealth_number, philhealth_member_type, father_last_name, 
    father_first_name, father_middle_name, mother_last_name, mother_first_name, mother_middle_name, guardian_last_name, guardian_first_name, guardian_middle_name, 
    guardian_relationship, guardian_contact_number, accomplished_by, name_of_accomplisher, name_of_physician, license_number) 
    VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
             ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
             ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
             ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
             ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
             ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../home.html?error=stmterror");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sssssssssssssssssssssssssssssssssssssssssssssssssssssssss", $username, $registrationType, $pwdNumber, $dateApplied, $pwdLastName, $pwdFirstName, $pwdMiddleName, 
                $pwdSuffix, $typeOfDisability, $medicalCondition, $causeOfDisability, $congenitalInborn, $acquired, $statusOfDisability, $address, $barangay, $landline, $mobileNumber, $email, 
                $dateOfBirth, $sex, $religion, $civilStatus, $educationalAttainment, $isVoter, $employmentStatus, $income, $categoryOfEmployment, $natureOfEmployment, $occupation, 
                $otherOccupation, $is4PsBeneficiary, $bloodType, $organizationAffiliated, $contactPerson, $officeAddress, $telNumber, $sssNumber, $gsisNumber, $psnNumber, 
                $philHealthNumber, $philHealthMemberType, $fatherLastName, $fatherFirstName, $fatherMiddleName, $motherLastName, $motherFirstName, $motherMiddleName, 
                $guardianLastName, $guardianFirstName, $guardianMiddleName, $guardianRelationship, $guardianContactNumber, $accomplishedBy, $nameOfAccomplisher, $nameOfPhysician, $licenseNumber);
    
    // echo $username, $registrationType, $pwdNumber, $dateApplied, $pwdLastName, $pwdFirstName, $pwdMiddleName, 
    //             $pwdSuffix, $typeOfDisability, $medicalCondition, $causeOfDisability, $congenitalInborn, $acquired, $statusOfDisability, $address, $barangay, $landline, $mobileNumber, $email, 
    //             $dateOfBirth, $sex, $religion, $civilStatus, $educationalAttainment, $isVoter, $employmentStatus, $income, $categoryOfEmployment, $natureOfEmployment, $occupation, 
    //             $otherOccupation, $is4PsBeneficiary, $bloodType, $organizationAffiliated, $contactPerson, $officeAddress, $telNumber, $sssNumber, $gsisNumber, $psnNumber, 
    //             $philHealthNumber, $philHealthMemberType, $fatherLastName, $fatherFirstName, $fatherMiddleName, $motherLastName, $motherFirstName, $motherMiddleName, 
    //             $guardianLastName, $guardianFirstName, $guardianMiddleName, $guardianRelationship, $guardianContactNumber, $accomplishedBy, $nameOfAccomplisher, $nameOfPhysician, $licenseNumber;
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../home.html?error=none");
    exit();
}

function insertSoloParentData($connection, $username, $registrationType, $pwdNumber, $dateApplied, $pwdLastName, $pwdFirstName, $pwdMiddleName, $pwdSuffix, $typeOfDisability, $medicalCondition,
                $causeOfDisability, $congenitalInborn, $acquired, $statusOfDisability, $address, $barangay, $landline, $mobileNumber, $email, $dateOfBirth, $sex, $religion, $civilStatus,
                $educationalAttainment, $isVoter, $employmentStatus, $income, $categoryOfEmployment, $natureOfEmployment, $occupation, $otherOccupation, $is4PsBeneficiary, $bloodType,
                $organizationAffiliated, $contactPerson, $officeAddress, $telNumber, $sssNumber, $gsisNumber, $psnNumber, $philHealthNumber, $philHealthMemberType, $fatherLastName, 
                $fatherFirstName, $fatherMiddleName, $motherLastName, $motherFirstName, $motherMiddleName, $guardianLastName, $guardianFirstName, $guardianMiddleName, $guardianRelationship,
                $guardianContactNumber, $accomplishedBy, $nameOfAccomplisher, $nameOfPhysician, $licenseNumber) {
    $sql = "INSERT INTO pwd_data(username, registration_type, pwd_number, date_applied, pwd_last_name, pwd_first_name, pwd_middle_name, pwd_suffix, 
    type_of_disability, medical_condition, cause_of_disability, congenital_inborn, acquired, status_of_disability, houseno_street_subdivision_address, 
    barangay, city_municipality, province, region, landline, mobile_number, email, date_of_birth, sex, religion, civil_status, educational_attainment, 
    is_voter, employment_status, income, category_of_employment, nature_of_employment, occupation, other_occupation, is_4ps_beneficiary, blood_type, 
    organization_affiliated, contact_person, office_address, office_telephone_number, sss_number, gsis_number, psn_number, philhealth_number, philhealth_member_type, 
    father_last_name, father_first_name, father_middle_name, mother_last_name, mother_first_name, mother_middle_name, guardian_last_name, guardian_first_name, 
    guardian_middle_name, guardian_relationship, guardian_contact_number, accomplished_by, name_of_accomplisher, name_of_physician, license_number) 
    VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
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

function insertSeniorCitizenData($connection, $username, $registrationType, $pwdNumber, $dateApplied, $pwdLastName, $pwdFirstName, $pwdMiddleName, $pwdSuffix, $typeOfDisability, $medicalCondition,
                $causeOfDisability, $congenitalInborn, $acquired, $statusOfDisability, $address, $barangay, $landline, $mobileNumber, $email, $dateOfBirth, $sex, $religion, $civilStatus,
                $educationalAttainment, $isVoter, $employmentStatus, $income, $categoryOfEmployment, $natureOfEmployment, $occupation, $otherOccupation, $is4PsBeneficiary, $bloodType,
                $organizationAffiliated, $contactPerson, $officeAddress, $telNumber, $sssNumber, $gsisNumber, $psnNumber, $philHealthNumber, $philHealthMemberType, $fatherLastName, 
                $fatherFirstName, $fatherMiddleName, $motherLastName, $motherFirstName, $motherMiddleName, $guardianLastName, $guardianFirstName, $guardianMiddleName, $guardianRelationship,
                $guardianContactNumber, $accomplishedBy, $nameOfAccomplisher, $nameOfPhysician, $licenseNumber) {
    $sql = "INSERT INTO pwd_data(id, username, registration_type, pwd_number, date_applied, pwd_last_name, pwd_first_name, pwd_middle_name, pwd_suffix, 
    type_of_disability, medical_condition, cause_of_disability, congenital_inborn, acquired, status_of_disability, houseno_street_subdivision_address, barangay, 
    city_municipality, province, region, landline, mobile_number, email, date_of_birth, sex, religion, civil_status, educational_attainment, is_voter, 
    employment_status, income, category_of_employment, nature_of_employment, occupation, other_occupation, is_4ps_beneficiary, blood_type, organization_affiliated, 
    contact_person, office_address, office_telephone_number, sss_number, gsis_number, psn_number, philhealth_number, philhealth_member_type, father_last_name, 
    father_first_name, father_middle_name, mother_last_name, mother_first_name, mother_middle_name, guardian_last_name, guardian_first_name, guardian_middle_name, 
    guardian_relationship, guardian_contact_number, accomplished_by, name_of_accomplisher, name_of_physician, license_number) 
    VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
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
