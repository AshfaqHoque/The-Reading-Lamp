<?php
    include 'showBook.php';
    $con = mysqli_connect('localhost', 'root', '', 'library');

    if (isset($_POST['input'])) {
        $value = $_POST['input']; // Escape input to prevent SQL injection
        $sql = "SELECT * FROM booklist WHERE btitle LIKE '{$value}%'"; // Fetch books whose title starts with the query
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                <div id="search-result">
                    <div id="resulted-books" style="background-color: #2c3e50; border-bottom: 1px solid #ecf0f1; border-radius: 10px;">
                        <a href="../view/showBookInfo.php?id='.$row['id'].'" style="text-decoration: none;">
                            <div style="display:inline-block; width:30%;"> 
                                <img id="resulted image" style="height:90px; width:auto; border-radius: 4px; padding-top: 5px;" src="../view/images/b'.$row['id'].'.jpg">
                            </div>
                            <div style="display:inline-block; width:60%;">
                                <p style="margin: 0; font-size: 14px; color: #ecf0f1; text-align:top;">'.showTitle($row['id']).'</p>
                                <p style="margin: 5px 0; color: #95a5a6;">'.$row['bstatus'].'</p>
                            </div> 
                        </a>
                    </div>
                </div>
                ';
            }
        } else {
            echo '<div id="search-result">
                    <p>No results found</p>
                </div>';
        }
    } else {
        echo '<div id="search-result">
                <p>Invalid search query</p>
            </div>';
    }
?>
