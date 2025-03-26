<?php
    function updatePassword($name,$pass)
    {
        $con = mysqli_connect('localhost', 'root', '', 'library');
        $sql= "UPDATE libraryinfo set password = '$pass' WHERE username = '$name'";

        if(mysqli_query($con, $sql)){
            return true;
        }
        else{
            return false;
        }
    }


?>