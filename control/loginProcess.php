<?php
    include '../model/verifyUser.php';
    if (isset($_POST["ubutton"])){
        $uname =$_POST["uname"] ;
        $upass = $_POST["upass"];

        if(verifyUserName($uname)){
            if(verifyUserPassword($uname,$upass)){
                session_start();
                $_SESSION["uname"] = $uname;
                header("refresh: 0.02; url = ../view/homepage.php");
                exit();
            }
            
            else{
                header("refresh: 0.02; url = ../view/index.php?error-login=invalid-password");
                exit();
            }
        }
        else{
            header("refresh: 0.02; url = ../view/index.php?error-login=user-not-found");
            exit();
        }
    }
   
    
?>