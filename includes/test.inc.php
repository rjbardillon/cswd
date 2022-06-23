<?php
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    if (isset($_POST['register'])) {
        if (isset($_POST['typeOfDisability'])) {
            $typeOfDisability = $_POST['typeOfDisability'];
            $str = implode (",", $typeOfDisability);
        } else {
            $str = "";
        }
       
        $sql = "INSERT INTO test(typeOfDisability) VALUES(?)";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../home.html?error=stmterror");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $str);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../test.html?error=none");
        exit();
    } else {
        echo 'Cick Me';
    }

?>