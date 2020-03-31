<!DOCTYPE html>
<html lang="en">
    <?php 
        include_once 'phpInc/database.inc.php';
        session_start();
    ?>
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Naslovnica</title>


    <link rel="stylesheet" href="css/index.css">
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

    <!-- Global site tag (gtag.js) - Google Analytics -->
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
        function onDivNewsClicked (id){
            return location.href = "newscontent.php?id="+id;
        }
        function onDivMatchesClicked (id){
            return location.href = "matchcontent.php?id="+id;
        }
    </script>
</head>
<body>

    <div class="jumbotron text-center pt-3 pb-4 mb-0">
        <div class="row">
            <div class="col-sm-9 pt-5">
                <h1 class="display-3" style="color: darkblue;">Santiago Bernabeu Društvo</h1>
                <p style="font-style: italic;">Website kreiran za navjernije navijače kraljevskog kluba!</p>
            </div>
            <div class="col-sm-3">
                <img src="/images/sb-drustvo-logo.jpg" style="border-radius: 50%;" width="200px" height="200px">
                <?php 
                    if(isset($_SESSION['firstname'])){
                        $currentUser = $_SESSION['firstname'];
                        echo '<h6 class="mt-3 mb-0">
                        <span style="text-decoration:underline; color: darkblue; font-style:italic;">
                        '.$currentUser.'</span>, dobrodošao/la nazad!</h6>';
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
                    <a class="nav-link active" href="index.php"><i class="fas fa-house-damage"></i> Naslovnica</a>
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
    <!--Main part of homepage-->
    <div class="container-fluid bg-light" style="padding-top: 20px;">

        <div class="row">
            <!--Matches section (first section)-->
            <div class="col-sm-3 border-right text-center">
            <!--Active polls-->
                <!--<div class="poll border p-2">
                    <h5>Aktivne ankete: 2</h5>
                    <a href="#">Glasaj!</a>
                </div>
                <hr>-->
                <h4 class="">Top utakmice mjeseca <i class="fas fa-calendar-check text-primary"></i></h4>
                <hr>
            <?php
                $sql = "SELECT * FROM matches WHERE topmatch = 1 ORDER BY id DESC";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if($resultCheck >=1){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '
                        <div class="onematch text-center border" onclick="onDivMatchesClicked('.$row['id'].')">
                        <h5 class="m-0 p-2 bg-light title">'.$row['title'].'</h5>
                        <div class="fakeimg">
                            <img src="'.$row['photoDestination'].'">
                        </div>
                        <h6 class="bg-light m-0 p-1">'.$row['result'].'</h6>';
                        if($row['ltw']=='l'){
                            echo '<h6 class="bg-danger text-white p-1 mb-0">Poraz</h6>';
                        }else if($row['ltw']=='t'){
                            echo '<h6 class="bg-warning text-white p-1 mb-0">Remi</h6>';
                        }else{
                            echo '<h6 class="bg-success text-white p-1 mb-0">Pobjeda</h6>';
                        }
                        echo '
                    </div>
                    <hr>
                        ';
                    }
                }else{
                    echo '<h6 class="text-center" >Trenutno niti jedna top utakmica nije objavljena. 
                    Ostale utakmice potražite <a href="playedmatches.php">ovdje</a>.</h6>';
                }
            ?>
            </div>
            <!--News section (middle section)-->
            <div class="col-sm-6 border-right">
                <h3 class="text-center">Aktualne vijesti
                    <i class="fas fa-map-pin text-primary"></i>
                </h3>
                <hr>
                <!--Kod za dohvaćanje iz baze podataka-->
                <?php
                    $sql="SELECT * FROM news WHERE topnews = 1 ORDER BY id DESC";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if($resultCheck >=1){
                        while($row = mysqli_fetch_assoc($result)){
                            echo '
                            <div class="onenews border" onclick="onDivNewsClicked('.$row['id'].')">
                                <h5 class="border-bottom m-0 p-2 title text-center bg-light">
                                    '.$row['title'].'</h5>
                                <div class="row no-gutters"> <!--no-gutters -> Removes horizontal paddings and negative margins-->
                                    <div class="col-sm-6">
                                        <div class="fakeimg">
                                            <img class="border" src="'.$row['photoDestination'].'">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <h6 class="text-center m-0 p-2 bg-light">
                                        '.$row['preview'].'</h6>
                                    </div>
                                </div>
                                <h6 class="text-right bg-light pr-1" style="font-size: small;">Objavio <span style="color:red;">'
                                .$row['postedBy'].'</span> 
                                    '.$row['datePosted'].' '.$row['timePosted'].' <i class="fas fa-thumbtack"></i></h6>
                            </div>
                        <div style="height: 20px;"></div> <!--Free space between news-->
                            ';
                        }
                    }else{
                        echo '<h6 class="text-center" >Trenutno niti jedna top vijest nije objavljena. 
                        Ostale vijesti potražite <a href="news.php">ovdje</a>.</h6>';
                    }
                ?>
            </div>
            <!--Admin section (third section)-->
            <div class="col-sm-3 text-center">
                <h4>Obavijesti administratora <i class="fas fa-user-cog text-primary"></i></h4>
                <hr>
                <h5 style="text-decoration:underline;">Ideje i prijedlozi</h5>
                <h6 class="bg-danger p-3">
                    Imate nove prijedloge i ideje za našu web platformu?<br><br>Javite nam se na naš email
                    <a class="text-white" href="#">info@sbdrustvo.com</a> i slobodno nam predložite Vaše ideje. Razložit ćemo 
                    sve prijedloge i odlučiti o mogućnosti implementiranja istih. Također, nastojat ćemo odgovoriti
                    na svaki Vaš email u što kraćem vremenskom roku.
                </h6>
                <hr>
                <h5 style="text-decoration:underline;">Održavanje stranice</h5>
                <h6 class="bg-danger p-3">Dragi korisnici SBD web platforme, prije svakog većeg održavanja stranice
                    bit ćete unaprijed obaviješteni. Minimalistične promjene u izgledu/ pozadini događat će se spontano,
                    ovisno o zauzetosti administratora, no to neće ometati pregledavanje sadržaja na stranici. 
                </h6>
            </div>
        </div>
    </div>
    <!--Footer-->
    <?php include 'phpInc/footer.php';?>
</body>
</html>