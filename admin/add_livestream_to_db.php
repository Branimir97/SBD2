<?php

    if(isset($_POST['submit'])){
        session_start();
        include '../phpInc/database.inc.php';

        $title = $_POST['title'];
        $link = $_POST['link'];

        $date = date('d.m.Y.');
        $time = date('H:i:s');

        $currentAdmin = $_SESSION['firstname'];

        if(empty($title)|| empty($link)){
            exit(header("Location: new_livestream.php?=emptyInputs"));
        }else{
            $sql = "INSERT INTO livestreams (title, link, datePosted, timePosted, postedBy)
                VALUES ('$title', '$link', '$date', '$time', '$currentAdmin')";
            mysqli_query($conn, $sql);

            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn, $sql);
            $numberOfUsers = mysqli_num_rows($result);

            while($row = mysqli_fetch_assoc($result)){
                if ($row['notify'] == 1){
                    $currentUserEmail = $row['email'];
                    $to = "$currentUserEmail";
                    $subject = "Obavijest: Novi live prijenos na SBD platformi";
                    $message = "<h4 style='font-style:bold;'>Poštovani/a, 
                                    prije par trenutaka objavljen je novi live prijenos na SBD web stranici.
                                    Posjetite naš website i saznajte novosti!<br>
                                <h4>Naslov live prijenosa: <span style='color:dodgerblue'>$title</span></h4>
                                <h4><a href='https://sbdrustvo.com/livestreams.php'>Poveznica na sekciju live prijenosi</a></h4></h4>
                                <h5>Vijest objavio: Administrator<span style='color:red'> $currentAdmin</span>
                                <br><br>Vaš SBD Admin Team!</h5>";
                    $headers = "From: sbdpodrska@gmail.com \r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
                    mail($to, $subject, $message, $headers);
                }
            }

            exit(header("Location: new_livestream.php?=postedSuccessfully"));
        }
    }