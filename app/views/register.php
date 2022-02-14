<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon">
        <title>Registration</title>
</head>
<body>
<section>
    <p>registracia</p>
    <form action="../app/controllers/interactions.php?action=Register" method="post" name="signUP" oninput="check()">
         <input type="hidden" name="table" value="users">
        <p> <input type="email"  name="email" placeholder="email"  required ></p>
        <p> <input type="text" name="name" placeholder="meno priezvysko"  ></p>
        <p> <input type="text" name="username"  placeholder="uzivatelske meno" oninput=" checkInputs(this)"  required ></p>
        <p><input type="password" id="password" name="password" placeholder="heslo"  required ></p>
        <p><input type="password" id="repeat-password" placeholder="potvrd heslo" required></p>

        <label>Zobraziť Heslo <input type="checkbox"  onclick="show_Password(this)"></label>
        <input type="submit"  value="registruj sa ">
        <p id="values"></p>
    </form>
    <span id="message"></span>
</section>
</body>
<style>
        form{
                display: flex;
                flex-direction: column;
                width: 200px;
        }
        body{
                background-color: gray;
        }
</style>
</html>
<script>
// kontrola zhodnosti hesiel

function check() {
        var password = document.querySelector('#password').value;
        var confirm = document.querySelector('#repeat-password').value;
        let matching=document.querySelector('#message');
        matching.style.display="hidden";
        if (confirm !== password) 
        {
        matching.innerHTML="Hesla sa nezhoduju";
        matching.style.display="flex";
        matching.style.color="red";
        } 
        else
        {
        matching.innerHTML="Hesla sa zhoduju";
        matching.style.display="flex";
        matching.style.color="lightgreen";     
        }
                
        
}

function checkInputs(input)
{       

        if(input.value.match(/^([ a-z0-9])$/))
        {
                ("input " +input +" does not match");
        }
}
function show_Password(showPassword)
        {   
        if (showPassword.checked === true) 
        {            
                document.querySelector("#password").setAttribute("type","text");
                document.querySelector("#repeat-password").setAttribute("type","text");
        }
        else
        {
                document.querySelector("#password").setAttribute("type","password");
                document.querySelector("#repeat-password").setAttribute("type","password");
        }
        };



</script>