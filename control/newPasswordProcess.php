<?php
    include '../model/updateUser.php';
    if (isset($_POST["uconfirmbutton"])){
        $name = 'admin';
        $new_pass = $_POST["unpass"] ;
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/';
        if(preg_match($pattern, $new_pass)){
            if(updatePassword($name,$new_pass)){
                session_start();
                $_SESSION["uname"] = $name;
                header("refresh: 0.2; url = ../view/homepage.php");
            }
        }
        else{
            header("refresh: 0.2; url = ../view/newPassword.php?error=invalid-password-format");
            exit();
        }
    }    
?>