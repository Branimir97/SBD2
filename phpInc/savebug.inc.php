<?php

if(isset($_POST['submit'])){
    include_once 'database.inc.php';    
    session_start();

    $bugDate = $_POST['bugDate'];
    $content = $_POST['content'];
    $status = 0;
    $date = date("d.m.Y.");
    $time = date("H:i:s");

    if(isset($_SESSION['firstname'])){
        $currentUser = $_SESSION['firstname'];
    }
    if(empty($bugDate)||empty($content)){
        $_SESSION['error'] = 1;
        exit(header("Location: ../reportbug.php"));
    }else{
        $sql = "INSERT INTO bugs (bugDate, content, status, datePosted, timePosted, postedBy)
            VALUES ('$bugDate', '$content', '$status', '$date', '$time', '$currentUser')";
        mysqli_query($conn, $sql);
        $_SESSION['success'] = 1;
        exit(header("Location: ../reportbug.php"));
    }
}
