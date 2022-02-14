<?php

session_start();
require __DIR__."/../app/init.php";
$app = new App();
$app->run();