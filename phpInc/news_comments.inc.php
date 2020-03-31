<?php
    session_start();

    if(isset($_POST['submit'])){

        include_once 'database.inc.php';

        $comment = $_POST['comment'];
        $news_id = $_SESSION['news_id'];

        if(!empty($comment)){

            $currentUserFirst = $_SESSION['firstname'];
            $currentUserLast = $_SESSION['lastname'];
            $currentUser = $currentUserFirst .' '.$currentUserLast;

            $date = date("d.m.Y.");
            $time = date("H:i:s");
            
            $sql = "INSERT INTO news_comments (comment, news_id, datePosted, timePosted, postedBy)
                VALUES('$comment', '$news_id', '$date', '$time', '$currentUser');";
            mysqli_query($conn, $sql);

            header("Location: ../newscontent.php?id=$news_id");
            exit();

        }else{
            header("Location: ../newscontent.php?=$news_id");
            exit();
        }

    }