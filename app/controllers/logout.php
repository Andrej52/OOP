<?php
  include_once "../models/user.php";
  $user= new User;
  
    $user->signOut();
    echo"Logged out";
    exit();

    if (http_response_code() === 200) {
      header("Location:../public/404");
  }