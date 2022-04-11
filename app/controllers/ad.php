<?php

    session_start();
    include_once "../models/database.php";
    $db=new Database;

    $tablename=$_POST['table'];
    $targetdir = $_SERVER['DOCUMENT_ROOT']."/OOP/public";  // name of webpage needed intad of oop
    
    $rootdir=$targetdir.$_POST['header'];
    $rootdir = preg_replace('/\s+/', '-', $rootdir);
    $rootdir=$rootdir."-".$year;

   
    $img = $_FILES['image'];
    $file =$_FILES['doc'];
    $imgname =$img['name'];
    $filename =$file['name'];
    $TMP_img = $img['tmp_name'];
    $TMP_doc = $file['tmp_name'];

    if ($_POST['table'] === "table") {
        echo "unknown databasename";
    }
    else
    {
        if($img['size']  == 0 ){
            header("Location:../../public/home?error=image");
            echo "No image uploaded!";
            exit();
        }
        else{
            if (!is_dir($rootdir)) { 
                mkdir($rootdir);
                mkdir($rootdir."/images");

                $New_img=$rootdir."/images/".$imgname;
                $New_file=$rootdir."/doc/".$filename;
            
                move_uploaded_file($TMP_img,$rootdir."/images/".$imgname);
                move_uploaded_file($TMP_doc,$rootdir."/doc/".$filename);
                
                $_POST['image']=$New_img;
                $_POST['doc']=$New_file;
                $_POST['user']=$_SESSION['username'];

                if ($db->add($_POST)) 
                {
                    echo("sucesfully done!");
                    header("Location:../public/home?succes");
                    exit();
                }
            } 
            else {
                echo "topic with name: ".$header." already exist";
                header("Location:../../public/add?error=topicalreadyexist");
                exit();
            }
        }
    }
