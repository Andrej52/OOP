<?php
if(isset($_POST)) {
    include_once "../models/database.php";
    $db=new Database;

    if ($_POST['table'] === "table") {
        echo "unknown databasename";
    }
    else
    {
        $db->add($_POST);
        if($db->token)
        {
            header("Location:/OOP/public/add?=Sucesfull");
        }
        else    header("Location:/OOP/public/add?=Failed");
    }
}
else
    echo "post nebol uspesny";


 