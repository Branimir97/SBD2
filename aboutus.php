<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>O nama</title>

    <link rel="stylesheet" href="css/aboutus.css">
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
                <h1 class="display-4" style="color: darkblue;">O nama</h1>
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
                        <a class="dropdown-item active" href="aboutus.php">O nama <i class="fas fa-address-card"></i></a>
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
    <!--Main part of about us-->
    <div class="container-fluid">
        <h6 class="mt-3 text-center"><i class="fas fa-info-circle"></i> 
            Ovdje možete pročitati sve o nastanku naše web stranice kao i ostalih platformi na kojima smo aktivni.   
        </h6>
    </div>
   
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-6 bg-light p-2 d-flex align-self-center">
                <h6 class="text-center">
                Dobrodošli na web stranicu Santiago Bernabeu Društva (SBD).
                Mi smo organizacija koja prati najbolji Klub i sportsku instituciju na Svijetu - Real Madrid C.F.
                Većinom okupljamo sve pratitelje Real Madrida, Madridiste i Madridistice, s Balkana, ali naravno da su u 
                ovu veliku obitelj dobrodošli apsolutno svi koji vole boje Los Blancosa.
                Postojimo od 14.05.2015. godine i sa svakim danom trudimo se biti što aktivniji, 
                te samim tim donijeti još više vijesti koje su vezane za naš Klub.

                </h6> 
            </div>
            <div class="col-sm-6">
                <div class="fakeimg mb-3">
                    <img class="border" src="images/SBD1.jpg">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="fakeimg mb-3">
                    <img class="border" src="images/SBD2.jpg">
                </div>
            </div>
            <div class="col-sm-6 bg-light p-2 d-flex align-self-center">
                <h6 class="text-center mb-3">
                Trudimo se biti objektivni, ali jasno je da kada navijate za jedan Klub, onda ponekad doza subjektivnosti prevlada.
                Kod nas možete pronaći sve komentare na utakmicu, sve najave utakmice, transfere, priče i špekulacije. 
                Pratimo apsolutno sve vezano za Real Madrid.
                Baza koju pratimo je prva nogometna momčad najboljeg Kluba na Svijetu, 
                ali uvijek popratimo zbivanja vezana za košarku, drugu momčad Madrida (Castillu) i mlađe uzraste u nogometnoj sekciji.
                Uvijek smo otvoreni za sve vrste prijedloga glede poboljšanja našeg rada, tako da se uvijek možete javiti 
                putem našeg email-a <a href="#"></a>, putem inbox-a 
                Facebook ili Instagram stranice, ili putem broja preko Vibera i WhatsAppa koji je isto tako napisan u opisu 
                Facebook stranice.

                </h6>
            </div>
            <div class="col-sm-6 bg-light p-2 d-flex align-self-center">
                <h6 class="text-center mb-3">
                Ako je netko zainteresiran za rad na našoj stranici, može nam se isto tako putem ranije navedenih opcija javiti,
                gdje će nam se predstaviti i pojasniti zašto je baš on prava opcija za SBD.
                Svakako, ovo je mjesto koje najviše podržava riječ Madridista i Madridistica, te radimo sve 
                što je u našoj mogućnosti da se upravo Vaš glas čuje i najvažnije od svega nam je da komentirate i 
                da iznesete svoje mišljenje. Naravno, svaki komentar mora biti dobar komentar, a pod tim mislimo da mora 
                biti argumentiran i obrazložen, dok svaki drugi komentar koji je uvredljive naravi po bilo kojim osnovama, 
                upućen administratoru ili drugom Madridistu, odnosno Madridistici bit će tretiran s nultom stopom tolerancije 
                i kao takav bit će automatski izbačen iz naše sekcije komentiranja.
                Mi imamo Facebook stranicu, te Instagram profil. Trudimo se biti što aktivniji i na našem YouTube Kanalu, 
                te ćemo Vas svakako obavijestiti čim se proširimo i na neke druge društvene mreže.
                Cilj ste već do sada mogli sami shvatiti iz ovog opisa, tako da na kraju možemo dodati samo jednu uzrečicu, 
                koja je ujedno i zaštitni znak ove naše velike zajedničke obitelji -
                <br><br><strong>Hala MADRID y nada mas! Madridista para siempre!</strong>
                </h6> 
            </div>
            <div class="col-sm-6">
                <div class="fakeimg mb-3">
                    <img class="border" src="images/SBD3.jpg">
                </div>
            </div>
        </div>
    </div>
    <!--Footer-->
    <?php include 'phpInc/footer.php'; ?>
</body>
</html>