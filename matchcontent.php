<!DOCTYPE html>
<html lang="en">

<?php 
    session_start(); 
    include_once 'phpInc/database.inc.php';

    $id = $_GET['id'];
    $_SESSION['match_id'] = $id;
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 

    $sql = "SELECT title FROM matches WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
        echo '
            <title>'.$row['title'].'</title>
        ';
    ?>
    
    <link rel="stylesheet" href="css/matchcontent.css">
    <link rel="icon" href="images/sb-drustvo-logo.jpg">

    <!-- FontAwesome library-->
    <script src="https://kit.fontawesome.com/6aa1bd9ffa.js" crossorigin="anonymous"></script> 

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-155054635-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-155054635-1');
    </script>

    <!--Google AdSense-->
    <script data-ad-client="ca-pub-5326593259387721" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

    <script>
        function onDivOtherMatchesClicked(id){
            return location.href ="matchcontent.php?id="+id;
        }
    </script>
</head>
<body>
    <div class="jumbotron m-0 p-3">
        <div class="row">
            <div class="col-sm-2">
                <img src="/images/sb-drustvo-logo.jpg" style="border-radius: 50%;" width="150px" height="150px">
            </div>
            <div class="col-sm-10 text-left">
                <?php
                    $sql = "SELECT * FROM matches WHERE id = $id";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if($resultCheck >=1){
                        while($row = mysqli_fetch_assoc($result)){
                            echo '
                            <h1 class="display-5" style="color: darkblue;">'.$row['title'].'</h1>
                            <p>Objavio 
                                <span style="color: red;">'.$row['postedBy'].'</span> 
                                    '.$row['datePosted'].' '.$row['timePosted'].'</p>';
                            if($row['topmatch'] == 1){
                                $dateFromSql = strtotime($row['datePlayed']);
                                $myFormat = date('m/Y', $dateFromSql);
                                echo '
                                    <h6><img class="topmatch" src="images/top2.png">
                                        Top utakmica mjeseca ('.$myFormat.')</h6>
                                ';
                            }else{
                                echo '';
                            }
                        }
                    }   
                ?>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-sm bg-warning navbar-light sticky-top">
        <!--Brand-->
        <a class="navbar-brand" href="https://sbdrustvo.com/">SBD</a>
        <!--Toggler-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon">
            </span>
        </button>
        <!--Navbar links-->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="fas fa-house-damage"></i> Naslovnica</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="news.php"><i class="fas fa-newspaper"></i> Vijesti</a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        <i class="far fa-futbol"></i> Utakmice
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item active" href="playedmatches.php">Odigrane utakmice <i class="fas fa-history"></i></a>
                        <a class="dropdown-item" href="livestreams.php">Live prijenosi <i class="fab fa-youtube"></i></a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tables.php"><i class="fas fa-table"></i> Tablice</a>
                </li>
                <!--<li class="nav-item">
                    <a class="nav-link" href="poll.php"><i class="fas fa-poll"></i> Ankete</a>
                </li>-->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbardrop" href="#" data-toggle="dropdown">
                        <i class="fas fa-bullhorn"></i> Zajednica
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="https://www.facebook.com/santiagobernabeudrustvo/" target="_blank">
                            Facebook <i class="fab fa-facebook"></i></a>
                        <a class="dropdown-item" href="https://www.youtube.com/channel/UCGKi3Eg8RXSLZduRQJubRmA" target="_blank">
                            Youtube <i class="fab fa-youtube"></i></a>
                        <a class="dropdown-item" href="https://www.instagram.com/sbdrustvo/" target="_blank">
                            Instagram <i class="fab fa-instagram"></i></a>
                        <a class="dropdown-item" href="https://twitter.com/DrustvoSb" target="_blank">
                            Twitter <i class="fab fa-twitter"></i></a>
                        <a class="dropdown-item" href="https://discord.gg/Q383SA5" target="_blank">
                            Discord <i class="fab fa-discord"></i></a>
                        <a class="dropdown-item" href="https://sbdrustvo.blogspot.com/" target="_blank">
                            Magazin <i class="fas fa-blog"></i></a>
                        <a class="dropdown-item" href="https://www.patreon.com/sbdrustvo" target="_blank">
                            Patreon <i class="fab fa-patreon"></i></a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbardrop" href="#" data-toggle="dropdown">
                    <i class="fas fa-info-circle"></i> Više informacija
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="aboutus.php">O nama <i class="fas fa-address-card"></i></a>
                        <a class="dropdown-item" href="reportbug.php">Prijavi bug <i class="fas fa-bug"></i></a>
                    </div>
                </li>
                <?php 
                    if(isset($_SESSION['adminLoggedIn'])&&($_SESSION['adminLoggedIn']==true)){
                        echo '<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbardrop" href="#" data-toggle="dropdown">
                        <i class="fas fa-user-cog"></i> Administracija
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="admin/new_news.php">Postavi novu vijest <i class="fas fa-newspaper"></i></a>
                            <a class="dropdown-item" href="admin/new_match.php">Postavi novu utakmicu <i class="fas fa-history"></i></a>
                            <a class="dropdown-item" href="admin/new_livestream.php">Postavi novi live prijenos <i class="fab fa-youtube"></i></a>
                            <a class="dropdown-item" href="admin/statistics.php">Statistika <i class="fas fa-chart-line"></i></a>
                        </div>
                    </li>';
                    }
                ?>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <?php 
                        if(isset($_SESSION['firstname'])){
                            echo 
                            '<form action="phpInc/signout.inc.php" method="POST">
                                <button class="btn btn-danger" type="submit" name="submit">Odjava <i class="fas fa-sign-out-alt"></i></button>
                            </form>';
                        }else{
                            echo '<a href="login.php" role="button" class="btn btn-primary"> Prijava <i class="fas fa-key"></i></a>';
                        }
                    ?>
            </ul>
        </div>
    </nav>
    <!--Main part of matchcontent-->
    <div class="container-fluid pt-3 bg-light">
        <div class="row">
            <?php
                $sql = "SELECT * FROM matches WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if($resultCheck >=1){
                    while($row = mysqli_fetch_assoc($result)){
                        $contentWithParagraphs = nl2br($row['content']);
                        $dateFromSql = strtotime($row['datePlayed']);
                        $myFormat = date('d.m.Y.', $dateFromSql);
                        echo '
                        <div class="col-sm-6 text-center">
                            <h5>Ishod utakmice:</h5>';
                            if($row['ltw']=='l'){
                                echo '<h5 class="text-white bg-danger p-2">'.$row['result'].'</h5>';
                            }else if($row['ltw']=='t'){
                                echo '<h5 class="text-white bg-warning p-2">'.$row['result'].'</h5>';
                            }else{
                                echo '<h5 class="text-white bg-success p-2">'.$row['result'].'</h5>';
                            }
                            echo '
                            <h5 class="mt-4">Sadržaj</h5>
                            <p>'.$contentWithParagraphs.'</p>
                        </div>
                        <div class="col-sm-6 mt-2">
                        <h5 class="mt-2 mb-2 text-center">'.$row['stage'].'</h5>
                        <div class="fakeimg">
                            <img class="border" src="'.$row['photoDestination'].'">
                        </div>
                        <h6 class="text-center mt-2">Datum odigravanja: '.$myFormat.'</h6>
                        ';
                    }
                }
            ?>

            </div>
        </div>
        <div class="linkbox text-center">
            <h5 class="mt-3 mb-2">Korisne poveznice:</h5>
            <?php
                $sql = "SELECT * FROM matches WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    if(($row['link1']!='')){
                        echo '
                            <li><a href="'.$row['link1'].'" target="_blank">Link 1</a></li>
                        ';
                    }
                    if($row['link2']!=''){
                        echo '
                            <li><a href="'.$row['link2'].'" target="_blank">Link 2</a></li>
                        ';
                    }
                    if($row['link3']!=''){
                        echo '
                            <li><a href="'.$row['link3'].'" target="_blank">Link 3</a></li>
                        ';
                    }
                    if(($row['link1']=='')&&($row['link2']=='')&&($row['link3']=='')){
                        echo '<h6 style="color:red;">* Administrator nije postavio niti jednu poveznicu na ovu utakmicu!</h6>';
                    }
                }
            
            ?>
        </div>

        <!--Komentari na vijest-->
        <h4 class="mt-5 mb-3">Komentari na utakmicu <i class="far fa-comments"></i></h4>
        <?php
            if(isset($_SESSION['firstname'])==false){
                echo 
                '<h6 class="mb-4">
                    <span  class="bg-danger text-white p-1">Ukoliko niste prijavljeni u sustav, objava komentara je nemoguća!
                    </span>
                </h6>';
            }
        ?>

            <?php 
                $sql = "SELECT * FROM match_comments WHERE match_id = $id ORDER BY id ASC";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                $counter = 1;

                if($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo 
                        '<div class="media border p-3">
                            <h5>'.$counter.'</h5>
                            <img src="images/usericon.png" class="mr-3 mt-3 rounded-circle" style="width: 60px;">
                            <div class="media-body">
                                <h6>'.$row['postedBy'].' <small><i>-> Objavio '.$row['datePosted'].' '.$row['timePosted'].'
                                    </i></small></h6>
                                <p>'.$row['comment'].'</p>
                            </div>
                        </div>';
                        $counter++;
                    }
                }else{
                    echo
                    '<h6 class="text-center bg-warning p-3"> 
                        Trenutno niti jedan komentar na ovu utakmicu nije objavljen. Budite prvi i objavite komentar!
                    </h6>';
                }
            ?>

        
        <!--Forma za komentiranje-->
        <?php 
            if(isset($_SESSION['firstname'])){
                echo
                '<div class="mt-3">
                    <form action="phpInc/match_comments.inc.php" method="POST">
                        <div class="form-group">
                            <input class="form-control" type="text" 
                                placeholder="Ovdje unesite Vaš komentar" name="comment" id="comment" required>
                            <button class="btn btn-primary mt-1" type="submit" name="submit">Objavi komentar</button>
                        </div>
                    </form>
                </div>';
            }
        ?>
        <!--Ostale utakmice-->
        <h4 class="mt-5 mb-3">Pogledajte ostale utakmice</h4>
        <div class="row">
            <?php
                $sql = "SELECT * FROM matches WHERE id != $id ORDER BY id DESC LIMIT 4";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if($resultCheck >=1){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '
                        <div class="col-sm-3" style="margin-bottom: 50px;">
                            <div class="onematch border" onclick="onDivOtherMatchesClicked('.$row['id'].')">
                                <h5 class="text-center bg-primary m-0 p-2 text-white">'.$row['title'].'</h5>
                                <h6 class="text-center bg-warning text-white m-0 p-1">'.$row['result'].'</h6>
                                <div class="fakeimg2">
                                    <img src="'.$row['photoDestination'].'">
                                </div>';
                                if($row['topmatch']==1){
                                    echo '                            
                                        <div class="topright">
                                            <img src="images/top2.png">
                                        </div>';
                                }else{
                                    echo '';
                                }
                                echo '
                                <h6 class="text-center bg-secondary m-0 p-2 text-white">'.$row['stage'].'</h6>
                                <h6 class="p-1 text-right bg-light m-0" style="font-size: small;">
                                    Objavio <span style="color: red;">
                                        '.$row['postedBy'].'</span> '.$row['datePosted'].' '.$row['timePosted'].'</h6>
                            </div>
                        </div>';
                    }
                }else{
                    echo '
                        <h6 class="p-3 text-center">
                            Trenutno nema ostalih predloženih utakmica za pregled u ovoj sekciji.</h6>
                        ';
                }
            ?>
        </div>
    </div>
    <?php include 'phpInc/footer.php';?>
</body>
</html>