<?php
// Start the session to access session data
    session_start();

// Check if session variables exist before using the
    $sname = $_SESSION['sname'];
    $sid = $_SESSION['sid'];
    $btitle = $_SESSION['btitle'];
    $bdate = $_SESSION['bdate'];
    $edate = $_SESSION['edate'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow Book Receipt</title>
    <link rel="stylesheet" href="bookReciptStyle.css">
</head>
<body>

    <div class="receipt-container">
        <h1>Book Receipt</h1>
        <div class="receipt-details">
            <p><?php echo "Student Name: " . $sname; ?></p>
            <p><?php echo "Student ID: " . $sid; ?></p>
            <p><?php echo "Book Title: " . $btitle; ?></p>
            <p><?php echo "Borrow Date: " . $bdate; ?></p>
            <p><?php echo "Expire Date: " . $edate; ?></p>
        </div>
        <div class="footer-note">
            <p>Thank you for borrowing from our library.</p>
        </div>
    </div>

</body>
</html>
