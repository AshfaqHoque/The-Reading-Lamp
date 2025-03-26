
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Password</title>
    <link rel="stylesheet" href="newPasswordStyle.css">
</head>
<body>
    <div class="container">
        <h1>Verified!</h1>
        <form action="../control/newPasswordProcess.php" method="post">
            <div class="form-group">
                <label for="new-password"><b>Set New Password:</b></label>
                <input type="password" id="new-password" name="unpass" required>
            </div>
            <div class="button-group">
                <input type="submit" value="CONFIRM" name="uconfirmbutton">
            </div>
        </form>
        <div>
            <?php
                if (isset($_GET['error'])) {
                    echo '<p style="color: red;">Invalid password format. Please try again.</p>';
                }
            ?>
        </div>
    </div>
</body>
</html>
