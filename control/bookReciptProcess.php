<?php
include '../model/showBook.php';
// Start the session to store data between pages
session_start();

if (isset($_POST['sbutton'])) {
    $sname = $_POST['sname'];
    $sid = $_POST['sid'];
    $btitle = $_POST['btitle'];
    $edate = $_POST['edate'];
    $bdate = $_POST['bdate'];
    $borrowDate = new DateTime($bdate);
    $expireDate = new DateTime($edate);
    $interval = $borrowDate->diff($expireDate);

    $is_sname = true;
    $is_sid = true;
    $is_btitle = true;
    $is_edate = true;
    $isValid = true;

    // Validate student name
    if (!preg_match("/^[a-zA-Z]+$/", $sname)) {
        $is_sname = false;
        $isValid = false;
    }

    // Validate student ID format
    if (!preg_match("/^\d{2}-\d{5}-\d{1}$/", $sid)) {
        $is_sid = false;
        $isValid = false;
    }

    // Validate that the expire date is within 7 days
    if ($interval->days > 7) {
        $is_edate = false;
        $isValid = false;
    }

    // If validation fails, output error messages
    if (!$is_sname) {
        echo "<br>Invalid Name! Only letters allowed.";
        exit();
    }
    if (!$is_sid) {
        echo "<br>Invalid ID format.";
        exit();
    }
    if (!$is_edate) {
        echo "<br>Fix your expire date. Book must be submitted within 7 days.";
        exit();
    }

    // Check if the user has borrowed a book within the last 7 days
    $cookie_name = $sid;
    if (isset($_COOKIE[$cookie_name])) {
        echo "You cannot borrow within 7 days";
    } else {
        // Store the validated data in session
        $_SESSION['sname'] = $sname;
        $_SESSION['sid'] = $sid;
        $_SESSION['btitle'] = $btitle;
        $_SESSION['bdate'] = $bdate;
        $_SESSION['edate'] = $edate;
        $_SESSION['isValid'] = true; // Pass the validation flag

        $cookie_name = $sid; 
        $cookie_value = $btitle;
        setcookie($cookie_name, $cookie_value, time() + 60*60*24*7);
        
        updateQuantity($btitle,-1);
        // Redirect to bookRecipt.php after 2 seconds
        header("refresh: 0.02; url = ../view/bookRecipt.php");
        exit();
    }
}
?>
