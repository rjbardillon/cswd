<?php

if(isset($_POST['password-reset-email-submit'])) {

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    $url = "";

} else {
    header("Location: ../index.html");
}