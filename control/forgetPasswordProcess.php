<?php  
    include '../model/verifyUser.php';
    if (isset($_POST["uforgetbutton"])){
        $uname =$_POST["uname"] ;
        $ans = $_POST["ucolor"];
        if(verifyUserName($uname)){
            if(verifyAnswer($uname,$ans)){
                header("refresh: 0.2; url = ../view/newPassword.php");
                exit();
            }
            else{
                header("refresh: 0.2; url = ../view/forgetPassword.php?error=wrong-answer");
                exit();
            }
        }
        else{
            header("refresh: 0.2; url = ../view/forgetPassword.php?error=user-not-found");
            exit();
        }
    } 
?>