<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    include_once 'phpInc/database.inc.php';

    $sql = "SELECT * FROM matches";
    $result = mysqli_query($conn, $sql);
    $number_of_matches = mysqli_num_rows($result);

    //definiranje broja rezultata tj.vijesti po jednoj stranici
    $results_per_page = 8;

    //definiranje ukupnog broja stranica u ovisnosti o broju rezultata tj. vijesti
    $number_of_pages = ceil($number_of_matches / $results_per_page);

    //ukoliko nije postavljena varijabla page u GET metodi postavljamo stranicu na broj 1, inače na onu koja je spremljena u varijabli
    if(!isset($_GET['page'])){
        $page = 1;
    }else{
        $page = $_GET['page'];
    }

    //definiranje LIMIT parametra za povlačenje rezultata iz baze podataka
    $starting_limit_number = ($page - 1)*$results_per_page;

    //definiranje prethodne i sljedeće stranice
    $previous = $page - 1;
    $next = $page + 1;
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Odigrane utakmice</title>

    <link rel="stylesheet" href="css/playedmatches.css">
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
        function onDivMatchClicked(id){
            return location.href = "matchcontent.php?id="+id;
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
                <h1 class="display-4" style="color: darkblue;">Odigrane utakmice</h1>
                <p style="font-style: italic;">Website kreiran za navjernije navijače kraljevskog kluba!</p>
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
    <!--Main part of played matches-->
    <div class="container-fluid mt-3">
        <h6 class="mb-4 text-center"><i class="fas fa-info-circle"></i> 
            Ovdje možete pronaći odigrane utakmice u sezoni 2019./2020. od trenutka postavljanja stranice do danas.   
        </h6>
        <div class="row">
            <?php
            $sql = "SELECT * FROM matches ORDER BY id DESC LIMIT ".$starting_limit_number.','. $results_per_page;
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if($resultCheck >=1){
                while($row = mysqli_fetch_assoc($result)){
                    echo '
                    <div class="col-sm-3" style="margin-bottom: 70px;">
                        <div class="onematch border" onclick="onDivMatchClicked('.$row['id'].')">
                            <h5 class="title text-center bg-primary m-0 p-2 text-white">'.$row['title'].'</h5>';
                            if($row['ltw']=='l'){
                                echo '<h6 class="text-center bg-danger text-white m-0 p-1">'.$row['result'].'</h6>';
                            }else if($row['ltw']=='t'){
                                echo '<h6 class="text-center bg-warning text-white m-0 p-1">'.$row['result'].'</h6>';
                            }else 
                            echo '<h6 class="text-center bg-success text-white m-0 p-1">'.$row['result'].'</h6>';
                            
                            echo '
                            <div class="fakeimg">
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
                    <h5 class="p-3 text-center">Trenutno nije objavljena niti jedna odigrana utakmica.
                        Ukoliko se situacija nastavi pojavljivati kontaktirajte nas putem emaila: 
                        <a href="#">info@sbdrustvo.com</h5>';
            }
            ?>
        </div>
        <ul class="pagination justify-content-center">
            <?php
                if($page == 1){
                    $disable_previous = 'disabled';
                }else{
                    $disable_previous = '';
                }
                echo '<li class="page-item '.$disable_previous.'">
                    <a class="page-link" href="playedmatches.php?page='.$previous.'">&laquo Prethodna</a></li>';
            ?>
            <?php
                for($i = 1; $i <= $number_of_pages; $i++){
                    if($page == $i){
                        $active = 'active';
                    }else{
                        $active = '';
                    }                    
                    echo '<li class="page-item '.$active.'">
                        <a class="page-link" href="playedmatches.php?page='.$i.'">'.$i.'</a></li>';
                }
            ?>
            <?php
                if($page == $number_of_pages){
                    $disable_next = 'disabled';
                }else{
                    $disable_next = '';
                }
                echo '<li class="page-item '.$disable_next.'">
                    <a class="page-link" href="playedmatches.php?page='.$next.'">Sljedeća &raquo</a></li>';
            ?>
        </ul>
    </div>
    <!--Footer-->
    <?php include 'phpInc/footer.php'; ?>
</body>
</html>