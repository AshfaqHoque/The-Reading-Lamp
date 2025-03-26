<?php
    function showId($title)
    {
        $con = mysqli_connect('localhost', 'root', '', 'library');
        $sql= "SELECT id from booklist where title='$title'";

        $id =mysqli_fetch_assoc(mysqli_query($con, $sql))['id'];
        return $id;

    }
    function showTitle($id)
    {
        $con = mysqli_connect('localhost', 'root', '', 'library');
        $sql= "SELECT title from booklist where id=$id";

        $title =mysqli_fetch_assoc(mysqli_query($con, $sql))['title'];
        if(strlen($title)>25){
            return substr($title,0,25).'...';
        }else{
            return $title;
        }  
    }
    function showFullTitle($id)
    {
        $con = mysqli_connect('localhost', 'root', '', 'library');
        $sql= "SELECT title from booklist where id=$id";

        $title =mysqli_fetch_assoc(mysqli_query($con, $sql))['title'];
        return $title;

    }
    function showStatus($id)
    {
        $con = mysqli_connect('localhost', 'root', '', 'library');
        $sql= "SELECT status from booklist where id=$id";
        $var =mysqli_fetch_assoc(mysqli_query($con, $sql))['status'];
        return $var; 
    }
    function updateStatus($id,$status)
    {
        $con = mysqli_connect('localhost', 'root', '', 'library');
        $sql = "UPDATE booklist SET status='$status' WHERE id=$id";
        mysqli_query($con,$sql);
    }
    function showQuantity($id)
    {
        $con = mysqli_connect('localhost', 'root', '', 'library');
        $sql= "SELECT quantity from booklist where id=$id";

        $var =mysqli_fetch_assoc(mysqli_query($con, $sql))['quantity'];
        return $var; 
    }
    function showSummary($id)
    {
        $con = mysqli_connect('localhost', 'root', '', 'library');
        $sql= "SELECT summary from booklist where id=$id";

        $var =mysqli_fetch_assoc(mysqli_query($con, $sql))['summary'];
        return $var; 
    }
    function updateBookCount($id)
    {
        $con = mysqli_connect('localhost','root','','library');
        $sql = "UPDATE booklist SET count=count+1 WHERE id=$id";
        mysqli_query($con,$sql);
    }
    function mostViewedBooks()
    {
        $con = mysqli_connect('localhost', 'root', '', 'library');
        $sql = "SELECT id,title FROM booklist ORDER BY count DESC LIMIT 3";
        $result = mysqli_query($con, $sql);
        return $result;
    }
    function showRatingNumber($id)
    {
        $con = mysqli_connect('localhost', 'root', '', 'library');
        $sql = "SELECT rating FROM booklist WHERE id=$id";

        $var =mysqli_fetch_assoc(mysqli_query($con, $sql))['rating'];
        return $var; 
    }
    function showRatingStar($rating)
    {
        $rating=round($rating);
        $fullStar = "★";
        $emptyStar = "☆";
        $starRating = "";
        for($i=1; $i<=5; $i++)
        {
            if($i<=$rating){
                $starRating.=$fullStar;
            }
            else{
                $starRating.=$emptyStar;
            }
        }
        return $starRating;
    }
    function showPriceKindle($id)
    {
        $con = mysqli_connect('localhost', 'root', '', 'library');
        $sql = "SELECT price_kindle FROM booklist WHERE id=$id";

        $var =mysqli_fetch_assoc(mysqli_query($con, $sql))['price_kindle'];
        return $var; 
    }
    function showPriceHardcover($id)
    {
        $con = mysqli_connect('localhost', 'root', '', 'library');
        $sql = "SELECT price_hardcover FROM booklist WHERE id=$id";

        $var =mysqli_fetch_assoc(mysqli_query($con, $sql))['price_hardcover'];
        return $var; 
    }
    function updateQuantity($title,$value)
    {
        $id=showId($title);
        $con = mysqli_connect('localhost', 'root', '', 'library');
        $sql = "UPDATE booklist SET quantity=quantity+$value WHERE id=$id";
        mysqli_query($con,$sql);
        if(showQuantity($id)<=0)
        {
            updateStatus($id,'not available');
        }
        else{
            updateStatus($id,'available');
        }
    }
?>