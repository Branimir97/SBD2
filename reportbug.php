<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    include_once 'phpInc/database.inc.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prijavi bug</title>

    <link rel="icon" href="images/sb-drustvo-logo.jpg">
    <link rel="stylesheet" href="css/reportbug.css">

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
</head>
<body>
    <div class="jumbotron m-0 p-3">
        <div class="row">
            <div class="col-sm-2">
                <img src="/images/sb-drustvo-logo.jpg" style="border-radius: 50%;" width="150px" height="150px">
            </div>
            <div class="col-sm-10 text-left">
                <h1 class="display-4" style="color: darkblue;">Prijavi bug</h1>
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        <i class="far fa-futbol"></i> Utakmice
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="playedmatches.php">Odigrane utakmice <i class="fas fa-history"></i></a>
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
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" id="navbardrop" href="#" data-toggle="dropdown">
                    <i class="fas fa-info-circle"></i> Više informacija
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="aboutus.php">O nama <i class="fas fa-address-card"></i></a>
                        <a class="dropdown-item active" href="reportbug.php">Prijavi bug <i class="fas fa-bug"></i></a>
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
    <!--Main part of report bug-->
    <div class="container-fluid mt-3">
        <h6 class="mb-4 text-center"><i class="fas fa-info-circle"></i> 
            Ukoliko ste pronašli bug, prijavite ga putem obrasca. Ukoliko se utvrdi bug, nastojat' ćemo ga što prije ukloniti!
            Da bi ste prijavili bug morate biti prijavljeni! 
        </h6>
    </div>
    <div class="container">
        <div class="row">
            <?php
                if(isset($_SESSION['firstname'])){
                    echo '
                    <div class="col-sm-6 text-center border p-2">
                        <h5 class="text-center border p-2 mt-2 bg-primary text-white">Obrazac za prijavu buga u radu web stranice</h5>';
                        if(isset($_SESSION['error'])){
                            if($_SESSION['error'] == 1){
                                echo '
                                <h6 class="text-center mb-2" style="color:red">Potrebno je unesti oba tražena parametra za
                                 uspješnu prijavu buga!</h6>
                                ';
                            }
                        }
                        unset($_SESSION['error']);
                        if(isset($_SESSION['success'])){
                            if($_SESSION['success']==1){
                                echo '
                                    <h6 class="text-center mb-2" style="color:green">Bug uspješno prijavljen. Možete pratiti 
                                        status buga putem kartica postavljenih desno!
                                    </h6>
                                ';
                            }
                        }
                        unset($_SESSION['success']);
                        echo '
                        <hr class="bg-danger" style="width:50%;">
                        <i class="fas fa-arrow-circle-down"></i>

                        <form action="phpInc/savebug.inc.php" method="POST">
                            <div class="form-group">
                                <label for="bugDate">Vrijeme pojave buga:</label>
                                <input type="text" name="bugDate" class="form-control" placeholder="Kada ste uočili grešku koju prijavljujete?">
                            </div>
                            <i class="fas fa-arrow-circle-down"></i>
                            <div class="form-group">
                                <label for="content">Opis problema:</label>
                                <textarea type="text" class="form-control" rows="10" placeholder="Ovdje unesite što ne radi ispravno..."
                                id="content" name="content"></textarea>
                            </div>
                            <div class="text-right">
                                <button type="submit" name="submit" class="btn btn-danger">Prijavi bug</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-sm-6">
                        <h5 class="text-center">Prikaz prijavljenih bugova i njihovih statusa</h5>
                        <hr class="bg-warning" style="width:50%;">
                        <div id="accordion">
                            ';
                            $sql = "SELECT * FROM bugs ORDER BY id DESC";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);

                            if($resultCheck >= 1){
                                while($row = mysqli_fetch_assoc($result)){
                                    echo '
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="card-link" data-toggle="collapse" href="#collapse'.$row['id'].'">
                                                Bug #'.$row['id'].'
                                            </a>
                                            <span style="float:right; font-size:14px";>
                                                by <span style="color:darkblue; font-style :italic;">
                                                    '.$row['postedBy'].'</span>
                                            </span>
                                        </div>
                                        <div id="collapse'.$row['id'].'" class="collapse" data-parent="#accordion">
                                            <div class="card-body"><span class="border-bottom" style="font-size:small;">Opis problema</span><br>
                                                '.$row['content'].'<hr><span class="border-bottom" style="font-size:small;">Vrijeme prijave</span><br> 
                                                '.$row['datePosted'].' || '.$row['timePosted'].'
                                                <hr><span class="border-bottom" style="font-size:small;">Trenutni status</span><br>
                                                ';
                                                if($row['status']==0){
                                                    echo '
                                                        <i class="far fa-hourglass"></i> -> Bug je postavljen, čeka se pregled od strane administratora
                                                        ';
                                                }else if($row['status']==1){
                                                    echo '
                                                        <i class="fas fa-eye"></i> -> Bug je pregledan od strane aktivnih administratora
                                                        ';
                                                }else if($row['status']==2){
                                                    echo '
                                                        <i class="fas fa-tools"></i> -> Bug je otkriven, kroz vremenski interval od 24h će biti ispravljen
                                                        ';
                                                }else if($row['status']==3){
                                                    echo '
                                                    <i class="fas fa-check-circle"></i> -> Bug je ispravljen
                                                    ';
                                                }
                                                echo '
                                            </div>
                                        </div>
                                    </div>
                                 ';
                                }
                            }else{
                                echo '
                                    <h6 class="text-center">Trenutno niti jedan bug nije prijavljen!</h6>
                                ';
                            }
                        echo '</div>
                    </div>';
                }else{
                    echo '
                    <div class="col-sm-12 mb-4">
                        <h6 class="text-center bg-danger text-white p-3">
                        Trenutno niste prijavljeni u sustav, isključena Vam je mogućnost uvida u listu, kao i prijave buga!</h6>
                    </div>
                    ';
                }
            ?>
        </div>
    </div>
    <!--Footer-->
    <?php include 'phpInc/footer.php'; ?>
</body>
</html>