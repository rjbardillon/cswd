<?php

if (isset($_POST['senior-citizen-bday-cash-gift'])) {
    session_start();
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    $username = $_SESSION['username'];
    

} else if(isset($_POST['senior-citizen-bday-cash-incentive'])) {
    session_start();
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $username = $_SESSION['username'];

} else {
        header("location: ../registration.html");
        exit();
}