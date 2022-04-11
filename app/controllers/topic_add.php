<?php

session_start();
//$topic = new Topic;
$tablename = $_POST['table']; 
$sitename ="OOP";   // website name
$rootdir=$_SERVER['DOCUMENT_ROOT']."/{$sitename}/public/uploads/"; // root path of uploads
$targetdir =$rootdir.$_POST['header']."-".date("Y");

 if (!is_dir($targetdir)) 
{ 
    mkdir($targetdir);
    mkdir($targetdir."/images");

    if (isset($_FILES['files'])) 
    {
        mkdir($targetdir."/doc");
    }
}
//var_dump($_FILES);
//$topic->add($_POST);
foreach ($_FILES as $key => $file)
{
    for ($i=0; $i <sizeof($file['name']) ; $i++)
    { 
        if (str_contains($file['type'][$i],"image")) {
          echo "obrazok";
          var_dump($file['name'][$i]);
          move_uploaded_file($file['tmp_name'][$i],$targetdir."/images/".$file['name'][$i]);
        
        }
        else
        {
            echo "dokument";
            var_dump($file['name'][$i]);
            move_uploaded_file($file['tmp_name'][$i],$targetdir."/doc/".$file['name'][$i]);
           // $topic->add($targetdir."/images/".$file['name'][$i]);
           
        }
    
    }
}
