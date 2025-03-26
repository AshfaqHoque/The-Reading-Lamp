<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="forgetPasswordStyle.css">
</head>
<body>
    <div class="container">
        <h1>Forgot Password</h1>
        <form id="forget-password-form" action="../control/forgetPasswordProcess.php" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="uname" required>
            </div>
            <div class="form-group">
                <label for="color">What is your favorite color?</label>
                <input type="text" id="color" name="ucolor" required>
            </div>
            <input type="submit" value="Submit" name="uforgetbutton">
        </form>
        <div id="error-message">
            <?php
            if (isset($_GET['error'])) {
                $error = $_GET['error'];
                if ($error == 'wrong-answer') {
                    echo '<p style="color: red;">Wrong answer. Please try again.</p>';
                } elseif ($error == 'user-not-found') {
                    echo '<p style="color: red;">User not found. Please try again.</p>';
                }
            }
            ?>
        </div>
    </div>
    <script>
        
    </script>
</body>
</html>
