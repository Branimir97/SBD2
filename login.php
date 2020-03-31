<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prijava</title>

    <link rel="stylesheet" href="css/login.css">
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
    <div class="jumbotron text-center bg-primary text-white">
        <h1 class="mb-4">Prijava korisnika <i class="fas fa-sign-in-alt"></i></h1>
        <h6 class="mb-0"><i class="fas fa-info-circle"></i> 
            Ukoliko ste registrirani, unesite potrebne podatke za prijavu.
        </h6>
    </div>
    <div class="container" style="width: 40%;">
        <?php
            session_start();
            if(isset($_SESSION['successRegistration'])&&($_SESSION['successRegistration']==1)){
                echo '
                <h6 class="text-center mb-2" style="color:green">Uspješno ste se registrirali!
                    <br>Unesite Vaše podatke za prijavu.</h6>
                    ';
            }
            unset($_SESSION['successRegistration']);
            if(isset($_SESSION['error'])){
                if($_SESSION['error']==1){
                    echo '
                    <h6 class="text-center mb-2" style="color:red">Unesite tražene parametre i pokušajte ponovno!</h6>
                        ';
                }
                if($_SESSION['error']==2){
                    echo '
                    <h6 class="text-center" style="color:red">Ne postoji korisnik pod navedenom e-mail adresom.
                        <br>Pokušajte ponovno!</h6>
                        ';
                }
                if($_SESSION['error']==3){
                    echo '
                    <h6 class="text-center" style="color:red">Unijeli ste krivu lozinku za navedenu email adresu. 
                        <br>Ukoliko ste zaboravili lozinku pošaljite nam zahtjev za resetiranjem na email
                        <a href="#">info@sbdrustvo.com</a>.</h6>
                        ';
                }
            }
            unset($_SESSION['error']);
        ?>
        <form action="/phpInc/login.inc.php" method="POST">
            <div class="form-group">
                <label for="email">Email adresa: </label>
                <input type="email" class="form-control" 
                    placeholder="Unesite Vašu email adresu" name ="email" id="email" >
            </div>
            <div class="form-group">
                <label for="password">Lozinka: </label>
                <input type="password" class="form-control" 
                    placeholder="Unesite Vašu lozinku" name ="password" id="password" >
            </div>
            <a class="btn btn-danger" href="index.php" role="button">Natrag na početnu</a>
            <button type="submit" name="submit" class="btn btn-primary float-right">Prijava</button>
            <h6 class="m-3">Nemate korisnički račun? Registrirajte se pritiskom na gumb ispod.<br>
                <div class="text-center">
                    <a class="btn btn-secondary mt-3" href="registration.php" role="button">Registracija</a>
                </div>
            </h6>
        </form>
    </div>
</html>