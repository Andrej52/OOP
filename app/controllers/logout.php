<?php
  include_once "../models/user.php";
  $user= new User;

if ($_GET['action'] == "Logout") {
    $user->signOut();
    header("Location:/OOP/public/home");
    exit();
}
