<?php
    include "../model/showBook.php";
    session_start();
    if(!isset($_SESSION['uname'])){
        header("refresh: 0; url = ../view/index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <link rel="stylesheet" href="homepageStyle.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <ul>
                <li><a href="../control/logoutProcess.php">LOGOUT</a></li>
                <li><a>Token Validation</a></li>
                <li><a href="javascript:void(0);" id="bsearch-link">Book Search</a></li>
                <li><a>Book Loan</a></li>
                <li><a>Send Reminder</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1 id="header" style="display:block;">Taste Your Book Here</h1>
        <div id="main-container">
            <div class="left-container" style="display: inline-block;">
                <div id="search-bar-container" style="display: none;">
                    <input type="text" id="search-query" name="squery"
                     placeholder="Search here..." autocomplete="off" style="margin-right: 20px;"> 
                </div>  
                <div id="search-result">

                </div> 
            </div>
            <div class="gallery-container">
                <?php for ($i = 1; $i <= 6; $i++) { ?>
                <div class="images">
                    <a href="showBookInfo.php?id=<?php echo $i?>">
                        <img src="images/b<?php echo $i?>.jpg">
                        <p><?php echo showTitle($i) ?><br></p>
                        <h4><?php echo showStatus($i) ?></h4>
                    </a>
                </div>
                <?php } ?>
            </div>
            <div class="right-container">
                <div class="most-viewed-container">
                    <p style="margin:5px; text-align:left; font-size: 1.4em;">Most viewed books</p>
                    <?php
                    $result = mostViewedBooks();
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                            <a href="../view/showBookInfo.php?id='.$row['id'].'" style="text-decoration: none;">
                            <div style="display: inline-block; vertical-align:top; margin:7px;">
                                <div style="display:block;"> 
                                    <img style=" height:120px; width:90px; border-radius: 4px;" src="../view/images/b'.$row['id'].'.jpg">
                                </div>
                                <div style="display:block;">
                                    <p style="width:90px; margin: 0; font-size: 14px; color: #ecf0f1; text-align: center; vertical-align: top;">'.showTitle($row['id']).'</p>
                                </div> 
                            </div>
                            </a>
                        ';}
                    }
                    ?>
                </div>
                <div class="not-implemented-container">
                    <p style="margin:5px; text-align:left; font-size: 1.4em;">Most viewed books</p>
                    <?php
                    $result = mostViewedBooks();
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                            <a href="../view/showBookInfo.php?id='.$row['id'].'" style="text-decoration: none;">
                            <div style="display: inline-block; vertical-align:top; margin:7px;">
                                <div style="display:block;"> 
                                    <img style=" height:120px; width:90px; border-radius: 4px;" src="../view/images/b'.$row['id'].'.jpg">
                                </div>
                                <div style="display:block;">
                                    <p style="width:90px; margin: 0; font-size: 14px; color: #ecf0f1; text-align: center; vertical-align: top;">'.showTitle($row['id']).'</p>
                                </div> 
                            </div>
                            </a>
                        ';}
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
    <script>
        document.getElementById("bsearch-link").addEventListener("click", function(event){
            event.preventDefault();
            var sBar = document.getElementById("search-bar-container");
            if (sBar.style.display == "none") {
                sBar.style.display = "block";  // Shows the search bar
            } else {
                sBar.style.display = "none";   // Hides the search bar again
            }
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#search-query').keyup(function(){
                var input = $(this).val();
                if(input!=''){
                    $.ajax({
                        url:"../model/searchBook.php",
                        method:"POST",
                        data:{input:input},
                        dataType:"text",
                        success:function(data){
                            $('#search-result').html(data);
                        }
                    });
                }
                else{
                    $('#search-result').html('');
                }
            });
        });
    </script>

</body>
</html>
