<?php
if (isset($_POST)) {
    include_once "../models/user.php";

    $user= new User;
    $user->username= stripslashes($_POST['username']);
    $user->username= stripslashes(strtolower($user->username));
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
        if($user->result->num_rows > 0)
        {
            foreach($user->result as $key => $row)
            {
            $username=$row['username'];
            $id=$row['ID'];
            }
            session_start();

            $_SESSION['username']=$username;
            $_SESSION['id']=$id;
            $_SESSION["loggedin"]=TRUE;
            header("Location:/OOP/public/home?=UserLogged");
        }
        else
        {
            session_start();
            header("Location:/OOP/public/login?error=AuthFailed");
            exit();
        }
    }


}