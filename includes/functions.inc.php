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
        // if (userDataExists($connection, $username, "pwd_data") || userDataExists($connection, $username, "senior_citizen_data") || userDataExists($connection, $username, "solo_parent_data")) {
        //     header("location: ../profile.html");
        //     exit();
        // } else {
        //     header("location: ../home.html");
        //     exit();
        // }
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
    
    $data =  array($username, $registrationType, $pwdNumber, $dateApplied, $pwdLastName, $pwdFirstName, $pwdMiddleName, 
                $pwdSuffix, $typeOfDisability, $medicalCondition, $causeOfDisability, $congenitalInborn, $acquired, $statusOfDisability, $address, $barangay, $landline, $mobileNumber, $email, 
                $dateOfBirth, $sex, $religion, $civilStatus, $educationalAttainment, $isVoter, $employmentStatus, $income, $categoryOfEmployment, $natureOfEmployment, $occupation, 
                $otherOccupation, $is4PsBeneficiary, $bloodType, $organizationAffiliated, $contactPerson, $officeAddress, $telNumber, $sssNumber, $gsisNumber, $psnNumber, 
                $philHealthNumber, $philHealthMemberType, $fatherLastName, $fatherFirstName, $fatherMiddleName, $motherLastName, $motherFirstName, $motherMiddleName, 
                $guardianLastName, $guardianFirstName, $guardianMiddleName, $guardianRelationship, $guardianContactNumber, $accomplishedBy, $nameOfAccomplisher, $nameOfPhysician, $licenseNumber);
    // foreach ($data as $key => $value) {
    //     echo $value."<br>";
    // }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../home.html?error=none");
    exit();
}

function insertSoloParentData($connection, $username, $solo_parent_name, $sex, $date_of_birth, $place_of_birth, $address, $barangay, 
                            $educ_attainment, $occupation, $income, $fam_income, $tenurial, $religion, $contact_number, $marital_status, $classification_incidence,
                            $classification_when, $problems, $family_resources, $date_applied, $family_composition_name, $family_composition_relationship, $family_composition_age, 
                         $family_composition_civil_status, $family_composition_educ_attainment, $family_composition_occupation, $family_composition_monthly_income, $combinedArray) {
    $sql = "INSERT INTO solo_parent_data(username, solo_parent_name, sex, date_of_birth, place_of_birth, address, barangay, educ_attainment, occupation, 
    income, fam_income, tenurial, religion, contact_number, marital_status, classification_incidence, classification_when, problems, family_resources, 
    date_applied) 
    VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
            ?, ?, ?, ?, ?, ?, ?, ?, ?, ? );";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../home.html?error=stmterror");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssssssssssssssssssss", $username, $solo_parent_name, $sex, $date_of_birth, $place_of_birth, $address, $barangay, 
                         $educ_attainment, $occupation, $income, $fam_income, $tenurial, $religion, $contact_number, $marital_status, $classification_incidence,
                         $classification_when, $problems, $family_resources, $date_applied);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    for ($i=0; $i < count($family_composition_name); $i++) {
        $sql = "INSERT INTO solo_parent_family_composition(username, name, relationship, age, civil_status, educ_attainment, occupation, monthly_income) VALUES (?,?,?,?,?,?,?,?);";
        $stmt = $connection->prepare($sql);
        mysqli_stmt_bind_param($stmt, "ssssssss", $username, $family_composition_name[$i], $family_composition_relationship[$i], $family_composition_age[$i], $family_composition_civil_status[$i], $family_composition_educ_attainment[$i], $family_composition_occupation[$i], $family_composition_monthly_income[$i]);
        mysqli_stmt_execute($stmt); 
        mysqli_stmt_close($stmt);
    }  
    header("location: ../home.html?error=none");
    exit();
}

function insertSeniorCitizenData($connection, $username, $registration_type, $sr_citizen_num, $sr_citizen_first_name, $sr_citizen_middle_name, $sr_citizen_last_name, 
                                $sr_citizen_suffix, $barangay, $tirahan, $sex, $marital_status, $edad, $date_of_birth, $lugar_ng_kapanganakan, $telepono, $relihiyon, $hanapbuhay, $pensyon, 
                                $saan, $magkano, $pangalan_ng_asawa, $edad_asawa, $ilan_ang_anak, $kasama) {
    $sql = "INSERT INTO senior_citizen_data(username, registration_type, sr_citizen_num, sr_citizen_first_name, sr_citizen_middle_name, sr_citizen_last_name, sr_citizen_suffix, 
                                            barangay, tirahan, sex, marital_status, edad, date_of_birth, lugar_ng_kapanganakan, telepono, relihiyon, hanapbuhay, pensyon, saan, magkano, pangalan_ng_asawa, edad_asawa,
                                            ilan_ang_anak, kasama) 
    VALUES  ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
             ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
             ?, ?, ?,?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../home.html?error=stmterror");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssssssssssssssssssssssss", $username, $registration_type, $sr_citizen_num, $sr_citizen_first_name, $sr_citizen_middle_name, $sr_citizen_last_name, 
                          $sr_citizen_suffix, $barangay, $tirahan, $sex, $marital_status, $edad, $date_of_birth, $lugar_ng_kapanganakan, $telepono, $relihiyon, $hanapbuhay, $pensyon, 
                          $saan, $magkano, $pangalan_ng_asawa, $edad_asawa, $ilan_ang_anak, $kasama);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../home.html?error=none");
    exit();
}

function insertSeniorCitizenBirthdayCashGift($connection, $username, $last_name, $name, $middle_name, $osca_id_number, $address, $barangay, $date_of_birth, $contact_number) {
    $sql = "INSERT INTO sr_citizen_birthday_cash_gift(username, last_name, name, middle_name, osca_id_number, address, barangay, date_of_birth, contact_number) 
    VALUES  ( ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../home.html?error=stmterror");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sssssssss", $username, $last_name, $name, $middle_name, $osca_id_number, $address, $barangay, $date_of_birth, $contact_number);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../home.html?error=none");
    exit();
}

function insertSeniorCitizenBirthdayCashIncentive($connection, $username, $last_name, $first_name, $middle_name, $osca_id_number, $address, $barangay,$date_of_birth, $contact_number) {
    $sql = "INSERT INTO sr_citizen_birthday_cash_incentive(username, last_name, first_name, middle_name, osca_id_number, address, barangay, date_of_birth, contact_number) 
    VALUES  ( ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../home.html?error=stmterror");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sssssssss",$username, $last_name, $first_name, $middle_name, $osca_id_number, $address, $barangay,$date_of_birth, $contact_number);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../home.html?error=none");
    exit();
}

function userDataExists($connection, $username, $database) {
    $sql = "SELECT * FROM ".$database." WHERE username=?";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../home.html?error=stmterror");
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
