<?php
include_once "../models/user.php";
$user = new User;

if ($user->signOut()) {
    http_response_code(200);
    echo "userLoggedOut";
    header("Location:../../public/home");
}
    http_response_code(301);
    echo "Logout Failed";
    header("Location:../../public/home");