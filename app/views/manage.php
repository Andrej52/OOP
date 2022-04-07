<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/test.css">
    <script defer src="js/scripts.js"></script>
    <script defer src="assets/js/http.js"></script>
    <title>Manage</title>
</head>
<?php include_once __DIR__."../../components/navbar.php" ?>
<body>
    <?php 
    $topic = new Topic;
    $gall = new Gallery;
    $topic->management("adds");
    $gall->manage("galleries")
    ?>
</body>
<?php include_once __DIR__."../../components/footer.php" ?>
</html>