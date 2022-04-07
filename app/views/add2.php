<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="">
    link
    <script defer src=""></script>
    <title>Add</title>
</head>
<body>
    <h1>pridavanie test 2 </h1>
    <form action="../app/controllers/ad.php" enctype="multipart/form-data" method="post">
        <input type="hidden" name="table" value="test">
        <input type="text" placeholder="text1" name="">
        <input type="text" placeholder="text2" name="">
        <input type="text" placeholder="text3" name="">
        <input type="file" accept="image/*"    name="image" >
        <input type="submit" value="submit"  name="add" >
    </form>
</body>
</html>
<style>
        form{
                display: flex;
                flex-direction: column;
                width: 200px;
        }
        input{
            margin: 10px;
        }

</style><div class="current-time"></div>