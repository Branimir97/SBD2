<?php

if(isset($_POST['submit'])){

    session_start();
    include '../phpInc/database.inc.php';

    $title = $_POST['title'];
    $result = $_POST['result'];
    $datePlayed = $_POST['datePlayed'];
    $stage = $_POST['stage'];
    $lose = $_POST['lose'];
    $tie = $_POST['tie'];
    $win = $_POST['win'];
    $content = $_POST['content'];
    
    $link1 = $_POST['link1'];
    $link2 = $_POST['link2'];
    $link3 = $_POST['link3'];

    date_default_timezone_set('Europe/Zagreb');
    $date = date("d.m.Y.");
    $time = date("H:i:s");

    $file = $_FILES['file'];

    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    $currentAdmin = $_SESSION['firstname'];

    if($_POST['option']=="lose"){
        $ltw = l;
    }
    if($_POST['option']=="tie"){
        $ltw = t;
    }
    if($_POST['option']=="win"){
        $ltw = w;
    }

    if(isset($_POST['topmatch'])){
        $topmatch = 1;
    }else{
        $topmatch = 0;
    }

    if(empty($title) || empty($datePlayed) || empty($stage) || empty ($content)){
        header("Location: ../admin/new_match.php?=empty_inputs");
        exit();
    }else{
        $randomNumber = rand();
        $fileNameNew = $randomNumber.'.'.$fileActualExt;
        $fileDestination = '../uploads/matches/'.$fileNameNew;

        if(in_array($fileActualExt, $allowed)){
            if(($fileError === 0) && ($fileSize < 1000000)){
                move_uploaded_file($fileTmpName, $fileDestination);
                /*$sql = "INSERT INTO matches 
                    (title, result, ltw, stage, datePlayed, content, topmatch, link1, link2, link3, datePosted, timePosted, postedBy, photoDestination)
                    VALUES 
                    ('$title', '$result', '$ltw','$stage', '$datePlayed', '$content', '$topmatch', '$link1', '$link2', '$link3', '$date', '$time', '$currentAdmin', '$fileDestination');";
                mysqli_query($conn, $sql);*/

                $sql = "INSERT INTO matches(title, result, ltw, stage, datePlayed, content, topmatch, link1, link2, link3, datePosted, timePosted, postedBy, photoDestination)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    echo 'Problem occurred processing SQL entry';
                }else{
                    mysqli_stmt_bind_param($stmt, "ssssssisssssss", $title, $result, $ltw, $stage, $datePlayed, $content, $topmatch, $link1, $link2, $link3, $date, $time, $currentAdmin, $fileDestination);
                    mysqli_stmt_execute($stmt);
                }
        
                $sql = "SELECT * FROM users WHERE notify = 1";
                $result = mysqli_query($conn, $sql);
                $numberOfUsers = mysqli_num_rows($result);

                while($row = mysqli_fetch_assoc($result)){
                    $currentUserEmail = $row['email'];
                    $to = "$currentUserEmail";
                    $subject = "Obavijest: Nova utakmica na SBD platformi";
                    $message = "<h4 style='font-style:bold;'>Poštovani/a, 
                                    prije par trenutaka objavljena je nova utakmica na SBD web stranici.
                                    Posjetite naš website i saznajte novosti!<br>
                                <h4>Utakmica: <span style='color:dodgerblue'>$title</span></h4>
                                <h4><a href='https://sbdrustvo.com/matches.php'>Poveznica na sekciju utakmice</a></h4></h4>
                                <h5>Vijest objavio: Administrator<span style='color:red'> $currentAdmin</span>
                                <br><br>Vaš SBD Admin Team!</h5>";
                    $headers = "From: sbdpodrska@gmail.com \r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
                    mail($to, $subject, $message, $headers);
                }
                header("Location: ../admin/new_match.php?=successfully-posted");
                exit();
            }else{
                header("Location: ../admin/new_match.php?=fileErrorOrImageTooBig");
                exit();
            }
        }else{
            header("Location: ../admin/new_match.php?=notAllowedExtension");
            exit();
        }
    }
}