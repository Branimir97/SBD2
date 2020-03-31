<?php

if(isset($_POST['submit'])){
    session_start();
    include '../phpInc/database.inc.php';

    /*$title = mysqli_real_escape_string($conn, $_POST['title']);
    $preview = mysqli_real_escape_string($conn, $_POST['preview']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    $link1 = mysqli_real_escape_string($conn, $_POST['link1']);
    $link2 = mysqli_real_escape_string($conn, $_POST['link2']);
    $link3 = mysqli_real_escape_string($conn, $_POST['link3']);*/

    $title = $_POST['title'];
    $preview = $_POST['preview'];
    $content = $_POST['content'];

    $link1 = $_POST['link1'];
    $link2 = $_POST['link2'];
    $link3 = $_POST['link3'];

    date_default_timezone_set('Europe/Zagreb');
    $date = date("d.m.Y.");
    $time = date("H:i:s");

    $file = $_FILES['file']; //dohvaćanje datoteke (slike)

    $fileName = $file['name']; //ime datoteke
    $fileTmpName = $file['tmp_name']; //trenutna lokacija datoteke
    $fileSize = $file['size']; //veličina datoteke
    $fileError = $file['error']; //greška u datoteci
    $fileType = $file['type']; //vrsta datoteke

    $fileExt = explode('.', $fileName); //rastav imena datoteke na prije i poslije točke
    $fileActualExt = strtolower(end($fileExt)); //uzimanje zadnjeg dijela imena datoteke, odnosno čiste ekstenzije

    $allowed = array('jpeg', 'jpg', 'png'); //dopuštene ekstenzije

    $currentAdmin = $_SESSION['firstname'];

    if(isset($_POST['topnews'])){
        $topnews = 1;
    }else{
        $topnews = 0;
    }

    if(empty($title) || empty($preview) || empty($content)){
        exit(header("Location: ../admin/new_news.php?=emptyInputs"));
    }else{
        $randomNumber = rand();
        $fileNameNew = $randomNumber.'.'.$fileActualExt;
        $fileDestination = '../uploads/news/'.$fileNameNew;

        if(in_array($fileActualExt, $allowed)){
            if(($fileError === 0) && ($fileSize < 1000000)){
                move_uploaded_file($fileTmpName, $fileDestination);

                /*$sql = "INSERT INTO news (title, preview, content, topnews, link1, link2, link3, datePosted, timePosted, postedBy, photoDestination)
                    VALUES ('$title', '$preview', '$content', '$topnews', '$link1', '$link2', '$link3', '$date', '$time', '$currentAdmin', '$fileDestination');";
                mysqli_query($conn, $sql);*/

                $sql = "INSERT INTO news (title, preview, content, topnews, link1, link2, link3, datePosted, timePosted, postedBy, photoDestination)
                        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    echo 'Problem occurred processing SQL entry';
                }else{
                    mysqli_stmt_bind_param($stmt, "sssisssssss", $title, $preview, $content, $topnews, $link1, $link2, $link3, $date, $time, $currentAdmin, $fileDestination);
                    mysqli_stmt_execute($stmt);
                }

                $sql = "SELECT * FROM users WHERE notify = 1";
                $result = mysqli_query($conn, $sql);
                $numberOfUsers = mysqli_num_rows($result);
                while($row = mysqli_fetch_assoc($result)){ 
                    $currentUserEmail = $row['email'];
                    $to = "$currentUserEmail";
                    $subject = "Obavijest: Nova vijest na SBD platformi";
                    $message = "<h4 style='font-style:bold;'>Poštovani/a, 
                                    prije par trenutaka objavljena je nova vijest na SBD web stranici.
                                    Posjetite naš website i saznajte novosti!<br>
                                <h4>Naslov vijesti: <span style='color:dodgerblue'>$title</span></h4>
                                <h4><a href='https://sbdrustvo.com/news.php'>Poveznica na sekciju vijesti</a></h4></h4>
                                <h5>Vijest objavio: Administrator<span style='color:red'> $currentAdmin</span>
                                <br><br>Vaš SBD Admin Team!</h5>";
                    $headers = "From: sbdpodrska@gmail.com \r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
                    mail($to, $subject, $message, $headers);
                }

                exit(header("Location: ../admin/new_news.php?=successfullyPostedNews"));
            }else{
                exit(header("Location: ../admin/new_news.php?=fileErrorOrImageTooBig"));
            }
        }else{
            exit(header("Location: ../admin/new_news.php?=notAllowedExtension"));
        }    
    }
}
