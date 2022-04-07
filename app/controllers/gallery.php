<?php

session_start();
$user=$_SESSION['username'];
$gall= new Gallery;
if (isset($_POST))
{
    $rootdir=$_SERVER['DOCUMENT_ROOT'].$sitename."/public/uploads/galleries/";
    $rootdir=$rootdir.$_POST['header'];
    $rootdir = preg_replace('/\s+/', '-', $rootdir);
    $year=date("Y");
    $rootdir=$rootdir."-".$year;
    
    if (!dir($rootdir)) {
        mkdir($rootdir);
        mkdir($rootdir."/img");
    }
    $rootdir=$rootdir."/img";
    for ($i=0;$i<sizeof($_FILES['images']);$i++)
     { 
        $tmp=$_FILES['images']['tmp_name'][$i];
        $newname[$i]=str_replace($_FILES['images']['name'][$i],$header."-".strval($i).".png",$_FILES['images']['name'][$i]);
        $newname[$i]=$rootdir.'/'.$newname[$i];
        move_uploaded_file($tmp,$newname[$i]); 
    }
    $_POST['images']=$rootdir;
    $gall->add($_POST);
}