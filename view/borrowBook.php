<?php
include '../model/showBook.php';
$bid = $_GET['id']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow Book</title>
    <link rel="stylesheet" href="borrowBookStyle.css">
</head>
<body>
    <div class="borrow-book-container">
        <h2>Borrower's Information</h2>
        <form action="../control/bookReciptProcess.php?id=<?php echo $bid; ?>" method="post">
            <label for="sname">Student Name</label>
            <input type="text" id="sname" name="sname"><br>
            <label for="sid">Student ID</label>
            <input type="text" id="sid" name="sid"><br>
            <label for="btitle">Book Title</label>
            <input type="text" id="bid" name="btitle" value="<?php echo htmlspecialchars(showFullTitle($bid)); ?>" readonly><br>
            <label for="bdate">Borrow Date</label>
            <input type="date" id="bdate" name="bdate"><br>
            <label for="edate">Expire Date</label>
            <input type="date" id="edate" name="edate"><br><br>
            <input type="submit" value="Submit" name="sbutton">
            <a href="javascript:history.back()" class="back-button">Back</a>
        </form>
    </div>
    
</body>
</html>