<?php
  include_once "../models/user.php";
  $user= new User;


if (isset($_POST) && $_GET['action'] == "Register") {

    $user->username=strtolower($_POST['username']);
    $user->password=$_POST['password'];
    $user->name=$_POST['name'];
    $user->email=$_POST['email'];
    $user->password=hash("sha1",$user->password.$user->username);
    $user->signUp();

    if($user->result === TRUE)
    {
            header("Location:/OOP/public/home");
            exit();
            //echo"<p>registracia uspesna</p>";
    }
    elseif($user->result === False)
    {
            header("Location:/OOP/public/register/error");
               //echo"<p>registracia neuspesna</p>";
    }
    else
    {
            header("Location:/OOP/public/register?error=UserAlreadyExist");
            //echo"<p>registracia neuspesna , uzivatel existuje</p>";
    }
}

if (isset($_POST) && $_GET['action']  == "Login") {
    $user->username= stripslashes(strtolower($_POST['username']));
    $user->password=stripslashes($_POST['password']);
    $user->password=hash("sha1",$user->password.$user->username);

    if ($user->username == "" && $user->password == "")
    {
        header("Location:/OOP/public/login?error=emptyInputs");
    }
    elseif ($user->username == "" ) {
        header("Location:/OOP/public/login?error=emptyUsername");
    }
    elseif ($user->password == "")
    {
        header("Location:/OOP/public/login?error=emptyPwd");
    }
    else
    {
        $user->signIn();
        if($user->result->num_rows == 1)
        {
            session_start();

            foreach($user->result as $key => $row)
            {
            $username=$row['username'];
            $id=$row['ID'];
            }

            $_SESSION['username']=$username;
            $_SESSION['id']=$id;
            $_SESSION["loggedin"]=TRUE;
            header("Location:/OOP/public/home");
            exit();
        }
        else
        {
            session_start();
            header("Location:/OOP/public/login?error=AuthFailed");
            exit();
        }
    }
}

if ($_GET['action']=="Logout") {
    $user->signOut();
    header("Location:/OOP/public/home");
    exit();
}
