<?php
  include_once "../models/user.php";
  $user= new User;
  
   $user->signOut();
    
   echo"Logged out";
   header("Location:/OOP/public/login");
   exit();
