<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informacije o web mjestu</title>

    <link rel="stylesheet" href="/css/pageinfo.css">
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
</head>
<body>
<div class="jumbotron m-0 p-3">
        <div class="row">
            <div class="col-sm-2">
                <img src="/images/sb-drustvo-logo.jpg" style="border-radius: 50%;" width="150px" height="150px">
            </div>
            <div class="col-sm-10 text-left">
                <h1 class="display-4" style="color: darkblue;">Informacije o web mjestu</h1>
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
    <!--Main part of page info-->
    <div class="container-fluid mt-3 text-center">
        <h6><i class="fas fa-info-circle"></i> Ovdje se možete informirati o osobama koje vode web stranicu i
            ostale mreže na kojima je SBD aktivno (Facebook, Instagram, itd.).
        </h6>
    </div>
    <div class="container mt-3">
        <hr>
        <h2 class="text-center">Web administratori</h2>
        <div class="row d-flex justify-content-center mb-4 mt-4">
            <div class="col-sm-3">
                <h6 class="text-center text-white bg-danger m-0 p-2">Marko</h6>
                <div class="fakeimg border">
                    <img src="images/admin.png">
                </div>
                <h6 class="text-center text-white bg-primary p-2">System administrator</h6>
            </div>
            <div class="col-sm-3">
                <h6 class="text-center text-white bg-danger m-0 p-2">Branimir</h6>
                <div class="fakeimg border">
                    <img src="images/admin.png">
                </div>
                <h6 class="text-center text-white bg-info p-2">Webmaster</h6>
            </div>
            <div class="col-sm-3">
                <h6 class="text-center text-white bg-danger m-0 p-2">Vinko</h6>
                <div class="fakeimg border">
                    <img src="images/admin.png">
                </div>
                <h6 class="text-center text-white bg-primary p-2">System administrator</h6>
            </div>
        </div>
        <hr>
        <h6 class="text-center">Otvoreni smo za sve moguće prijedloge koji idu u korist SBD web stranice. Ukoliko imate prijedlog, slobodno
                        nas kontaktirajte putem email-a <a href="#">info@sbdrustvo.com</a>. Također, ukoliko 
                        uočite pogreške u radu, postoji odjeljak <a href="reportbug.php">Prijavi bug</a> gdje nam možete dati do znanja
                        da nešto ne radi ispravno.
                    <br><br><span>Vaš SBD Admin Team!</span> 
            
        <!--
        <h2 class="text-center">Moderatori na ostalim mrežama</h2>
        <div class="row mt-4 mb-4">
            <div class="col-sm-3">
                <h6 class="text-center text-white bg-warning m-0 p-2">Nije definirano</h6>
                <div class="fakeimg border">
                    <img src="images/moderator.png">
                </div>
                <h6 class="text-center text-white bg-primary p-2">------</h6>
            </div>
            <div class="col-sm-3">
                <h6 class="text-center text-white bg-warning m-0 p-2">------</h6>
                <div class="fakeimg border">
                    <img src="images/moderator.png">
                </div>
                <h6 class="text-center text-white bg-primary p-2">Patreon administrator</h6>
            </div>
            <div class="col-sm-3">
                <h6 class="text-center text-white bg-warning m-0 p-2">------</h6>
                <div class="fakeimg border">
                    <img src="images/moderator.png">
                </div>
                <h6 class="text-center text-white bg-primary p-2">Twitter moderator</h6>
            </div>
            <div class="col-sm-3">
                <h6 class="text-center text-white bg-warning m-0 p-2">------</h6>
                <div class="fakeimg border">
                    <img src="images/moderator.png">
                </div>
                <h6 class="text-center text-white bg-primary p-2">Facebook moderator</h6>
            </div>
        </div>-->
    </div>
        <!--Footer-->
        <footer class="pt-2 bg-light">
            <!--Links-->
            <div class="container-fluid">
                <div class="row text-center mt-3">
                    <div class="col-sm-6 bg-light border-right">
                        <h5 style="text-decoration: underline;">Izdvojeno</h5>
                        <ul class="list-unstyled">
                            <li class="list-item"><a href="news.php">Vijesti</a></li>
                            <li class="list-item"><a href="livestreams.php">Live prijenosi</a></li>
                            <li class="list-item"><a href="aboutus.php">O nama</a></li>
                            <li class="list-item"><a href="pageinfo.php">Informacije o web mjestu</a></li>
                            <li class="list-item"><a href="reportbug.php">Prijavi bug</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 border-left">
                        <h5 style="text-decoration: underline;">Društvene mreže</h5>
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item">
                                <a href="https://www.facebook.com/santiagobernabeudrustvo/" 
                                    title="Facebook" class="btn btn-light border" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://twitter.com/DrustvoSb" 
                                    title="Twitter" class="btn btn-light border" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://www.patreon.com/sbdrustvo" 
                                    title="Patreon" class="btn btn-light border" target="_blank">
                                    <i class="fab fa-patreon"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://www.youtube.com/channel/UCGKi3Eg8RXSLZduRQJubRmA" 
                                    title="Youtube" class="btn btn-light border" target="_blank">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://discord.gg/Q383SA5" 
                                    title="Discord" class="btn btn-light border" target="_blank">
                                    <i class="fab fa-discord"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://www.instagram.com/sbdrustvo/" 
                                    title="Instagram" class="btn btn-light border" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://sbdrustvo.blogspot.com/" 
                                    title="Blog" class="btn btn-light border" target="_blank">
                                    <i class="fas fa-blog"></i>
                                </a>
                            </li>
                        </ul>
                        <h5 class="mt-4" style="text-decoration: underline;">Ideje i prijedlozi</h5>
                        <h6>Kontakt email: <a href="">info@sbdrustvo.com</a></h6>
                    </div>
                </div>
            </div>
            <!--Registration-->
            <div class="container">
                <ul class="list-unstyled list text-center py-2">
                    <li class="list-item">
                        <h5>Pridruži nam se!</h5>
                    </li>
                    <li class="list-item">
                        <a href="registration.php" class="btn btn-info">
                            Registracija
                        </a>
                    </li>
                </ul>
            </div>
            <!--Copyright-->
            <div class="text-center py-1 bg-light pb-3">© 2020 Copyright:
                <a class="font-weight-bold" href="#" target="_blank">sbdrustvo</a>
            </div>
    </footer>
</body>
</html>