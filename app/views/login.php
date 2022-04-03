<?php   if(isset($_SESSION['username']))header("Location:../public/home");    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="assets/js/http.js"></script>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="icon" href="">
    <title>Login</title>
</head>
<body>
<div class="overlay">
        <div class="login-wrap">
        <h1>Admin Login</h1>
        <form>
                <input  type="text" name="username" placeholder="Užívatelské meno/Email" >
                <input type="password" name="password" id="password" placeholder="Heslo" >
        </form>
        <label>Zobraziť Heslo <input type="checkbox" name="showPassword"  onclick="show_Password(this)"></label>
        <button class="login-btn" id="signIn" onclick="post(this)">Login</button>
        </div>
</div>
</body>
</html>
<script>
        function show_Password(showPassword)
        {   
        if (showPassword.checked === true) document.querySelector("#password").setAttribute("type","text");
        else document.querySelector("#password").setAttribute("type","password");
        };
</script>
