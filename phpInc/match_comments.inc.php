<?php
    session_start();

    if(isset($_POST['submit'])){

        include_once 'database.inc.php';

        $comment = $_POST['comment'];
        $match_id = $_SESSION['match_id'];

        if(!empty($comment)){

            $currentUserFirst = $_SESSION['firstname'];
            $currentUserLast = $_SESSION['lastname'];
            $currentUser = $currentUserFirst .' '.$currentUserLast;

            $date = date("d.m.Y.");
            $time = date("H:i:s");
            
            $sql = "INSERT INTO match_comments (comment, match_id, datePosted, timePosted, postedBy)
                VALUES('$comment', '$match_id', '$date', '$time', '$currentUser');";
            mysqli_query($conn, $sql);

            header("Location: ../matchcontent.php?id=$match_id");
            exit();

        }else{
            header("Location: ../matchcontent.php?id=$match_id");
            exit();
        }

    }