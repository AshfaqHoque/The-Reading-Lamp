<?php 
    include "../model/showBook.php";
    session_start();
    if(!isset($_SESSION['uname'])){
        header("refresh: 0  ; url = index.php");
        exit();
    }
    $bid = $_GET['id'];
    updateBookCount($bid);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo showTitle($bid); ?></title>
    <link rel="stylesheet" href="showBookInfoStyle.css">
</head>

<body>
    <header>
    <nav class="navbar">
            <ul>
                <li><a href="../control/logoutProcess.php">LOGOUT</a></li>
                <li><a>Token Validation</a></li>
                <li><a href="../view/homepage.php">Book Search</a></li>
                <li><a>Book Loan</a></li>
                <li><a>Send Reminder</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="main-container">
            <div class = "left-container">
                <a class="left-container-a-btn" href="homepage.php">< Back to Home</a>
                <img src="images/b<?php echo $bid; ?>.jpg">
                <a class="left-container-a-imglink">click to view full picture</a>
            </div>

            <div class="middle-container">
                <h2><?php echo showFullTitle($bid); ?></h2>
                <p style="display:inline-block; font: size 4.2em; font-family:'sans-serif'; font-weight:bold;">Rating: </p>
                <p class="rating"><strong><?php echo showRatingStar(showRatingNumber($bid)); ?></strong><?php echo "(".showRatingNumber($bid).")"; ?></p>
                <p class="summary-title"><strong>Summary:</strong></p>
                <p class="summary"><?php echo showSummary($bid); ?></p>
            </div>

            <div class="right-container">
                <?php 
                    $status = showStatus($bid); 
                    $color = ($status === 'available') ? '#7abd32' : '#ff0000'; // Green for available, red for not available
                ?>
                <div class="stock-info">
                    <h4 class="stock-status" style="color:<?php echo $color; ?>">
                        <?php
                            $status = showStatus($bid);
                            echo ($status=='available') ? 'In Stock' : 'Out of Stock';
                        ?>
                    </h4>
                    <p class="quantity-available">Quantity Available: <?php echo showQuantity($bid); ?></p>
                </div>
                <form action="buyBookProcess.php" method="POST">
                    <div class="radio-group">
                        <input type="radio" id="kindle" name="buy" value="kindle">
                        <label for="kindle" class="radio-btn">Kindle<br><?php echo showPriceKindle($bid); ?></label>
                        
                        <input type="radio" id="hardcover" name="buy" value="hardcover" checked>
                        <label for="hardcover" class="radio-btn">Hardcover<br><?php echo showPriceHardcover($bid); ?></label>
                    </div>
                    <input type="submit" value="Buy Book" name="buy-btn">
                </form>
                <a id="borrowBtn" href="borrowBook.php?id=<?php echo $bid; ?>">Borrow Book</a>
            </div>
        </div>
    </main>
</body>

</html>
