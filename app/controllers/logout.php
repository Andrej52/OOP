<?php
include_once "../models/user.php";
$user = new User;

$user->signOut();
exit();
