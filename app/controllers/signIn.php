<?php
if (isset($_POST)) {
    include_once "../models/user.php";
    $user = new User;
    $user->username = stripslashes($_POST['username']);
    $user->username = stripslashes(strtolower($user->username));
    $user->password = stripslashes($_POST['password']);
    $user->password = hash("sha1", $user->password . $user->username);
    if ($user->username == "" && $user->password == "") {
        http_response_code(400);
        header("Location:/OOP/public/login");
        echo "emptyInputs";
        exit();
    } elseif ($user->username == "") {
        http_response_code(400);
        header("Location:/OOP/public/login");
        echo "$emptyUsername";
        exit();
    } elseif ($user->password == "") {
        http_response_code(400);
        header("Location:/OOP/public/login");
        echo "emptyPassword";
        exit();
    } else {
        $user->signIn();
        if ($user->result->num_rows > 0) {
            foreach ($user->result as $key => $row) {
                $username = $row['username'];
                $id = $row['ID'];
            }

            session_start();

            $_SESSION['username'] = $username;
            $_SESSION['id'] = $id;
            $_SESSION["loggedin"] = TRUE;

            http_response_code(301);
            header("Location:/OOP/public/home");
            echo "user Logged Succesfully!";
            exit();
        }
        http_response_code(409);
        echo ("Auth failed");
        header("Location:/OOP/public/login");
        exit();
    }
}
