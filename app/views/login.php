<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="">
    <title>Login</title>
</head>
<body>

<form action="../app/controllers/interactions.php?action=Login" method="post">
        <h1>Admin Login</h1>
                <input  type="text" name="username" placeholder="Užívatelské meno/Email" >
                <input type="password" name="password" id="password" placeholder="Heslo" >
                <label>Zobraziť Heslo <input type="checkbox" name="showPassword"  onclick="show_Password(this)"></label>
                <button class="login-btn" type="submit" name="submit" onclick="showForgotPassword(this)">Login</button>
                <button class="forgot-password-btn">Zabudnuté Heslo</button>
</form>

</body>
</html>
<script>
        function show_Password(showPassword)
        {   
        if (showPassword.checked === true) 
            document.querySelector("#password").setAttribute("type","text");
        else
            document.querySelector("#password").setAttribute("type","password");
        };
</script>
<?php   if(isset($_SESSION['username']))header("Location:/OOP/public/home");    ?>
