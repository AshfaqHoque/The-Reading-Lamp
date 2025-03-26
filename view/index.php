<?php
    session_start();
    if(isset($_SESSION['uname'])){
        header("refresh: 0.2; url = ../view/homepage.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="loginStyle.css">
</head>
<body>
    <div class="login-container">
        <h2>Log in as a Librarian</h2>
        <form action="../control/loginProcess.php" method="post">
            <label for="uname">User Name </label>
            <input type="text" id="uname" name="uname">
            
            <label for="upass">Password </label>
            <input type="password" id="upass" name="upass">
            
            <input type="submit" value="LOGIN" name="ubutton">
            <a href="forgetPassword.php">Forget Password?</a>
        </form>
        <div>
        <?php
            if (isset($_GET['error-login'])) {
                $error = $_GET['error-login'];
                if ($error == 'invalid-password') {
                    echo '<p style="color: red;">Invalid password. Please try again.</p>';
                } elseif ($error == 'user-not-found') {
                    echo '<p style="color: red;">User not found. Please try again.</p>';
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
