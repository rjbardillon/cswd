<?php
    if (isset($_POST['submit'])) {
        require_once 'includes/dbh.inc.php';

        $family_composition_name = $_POST['family-composition-name'];
        $family_composition_relationship = $_POST['family-composition-relationship'];
        $family_composition_age = $_POST['family-composition-age'];
        $family_composition_civil_status = $_POST['family-composition-civil-status'];
        $family_composition_educ_attainment = $_POST['family-composition-educ-attainment'];
        $family_composition_occupation = $_POST['family-composition-occupation'];
        $family_composition_monthly_income = $_POST['family-composition-monthly-income'];
        $username = "rmbardillonjr";
        $combinedArray = array_merge($family_composition_name, $family_composition_relationship, $family_composition_age, $family_composition_civil_status, $family_composition_educ_attainment, $family_composition_occupation, $family_composition_monthly_income);
        $sql = "INSERT INTO solo_parent_family_composition(username, name, relationship, age, civil_status, educ_attainment, occupation, monthly_income) VALUES (?,?,?,?,?,?,?,?);";
        


        for ($i=0; $i < count($family_composition_name); $i++) { 
            $stmt = $connection->prepare($sql);
            mysqli_stmt_bind_param($stmt, "ssssssss", $username, $family_composition_name[$i], $family_composition_relationship[$i], $family_composition_age[$i], $family_composition_civil_status[$i], $family_composition_educ_attainment[$i], $family_composition_occupation[$i], $family_composition_monthly_income[$i]);
            mysqli_stmt_execute($stmt); 
            mysqli_stmt_close($stmt);
        }  
    }
?>