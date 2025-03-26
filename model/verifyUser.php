<?php
    function verifyUserName($uname){
        $con = mysqli_connect('localhost', 'root', '', 'library');
        $sql= "SELECT username FROM libraryinfo WHERE username = '$uname'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);
        if($count == 1){
            return true;
        }
        else{
            return false;
        }
       
    }
    function verifyUserPassword($uname, $upass){
        if(verifyUserName($uname)){
            $con = mysqli_connect('localhost', 'root', '', 'library');
            $sql= "SELECT password FROM libraryinfo WHERE username = '$uname'";
            $result =mysqli_fetch_assoc(mysqli_query($con, $sql))['password'];
            if($result == $upass){
                return true;
            }
            else{
                return false;
            }
        } 
    }
    function verifyAnswer($uname,$ucolor)
    {
        if(verifyUserName($uname)){
            $con = mysqli_connect('localhost', 'root', '', 'library');
            $sql= "SELECT color FROM libraryinfo WHERE username = '$uname'";
            $result =mysqli_fetch_assoc(mysqli_query($con, $sql))['color'];
            if($result == $ucolor){
                return true;
            }
            else{
                return false;
            }
        }  
    }


?>