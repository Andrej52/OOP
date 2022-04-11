<?php
include_once "../models/user.php";
$user = new User;

if ($user->signOut()) {
    http_response_code(200);
    echo "userLoggedOut";
    header("Location:".$_SERVER['DOCUMENT_ROOT']."/public/home");
}
    http_response_code(301);
    echo "Logout Failed";
    header("Location:".$_SERVER['DOCUMENT_ROOT']."/public/home");