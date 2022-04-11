<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="">
    <link rel="stylesheet" href="assets/css/test.css">
    <script defer src=""></script>
    <title>Add</title>
</head>
<body>
    <h1>pridavanie test 2 </h1>
    <form action="../app/controllers/topic_add.php" enctype="multipart/form-data" method="post">
        <input type="hidden" name="table" value="galleries">
        <input type="text" placeholder="text1" name="header">
        <textarea name="desc" cols="30" rows="10"></textarea>
        <input type="file" accept="image/*"    name="img[]" multiple >
        <input type="file" accept="doc/*"    name="files[]"  >
        <input type="submit" value="submit">
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