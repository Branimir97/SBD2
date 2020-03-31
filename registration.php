<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registracija</title>

    <link rel="stylesheet" href="css/registration.css">
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
    <div class="jumbotron bg-primary text-white text-center pb-4 pt-5">
        <h1 class="mb-4">Registracija novog korisnika <i class="fas fa-user-alt"></i></h1>
        <h6 class="mb-0"><i class="fas fa-info-circle"></i> 
            Za uspješnu registraciju potrebno je popuniti sve podatke!
        </h6>
    </div>
    <div class="container" style="width: 40%;">
        <?php
            session_start();
            if(isset($_SESSION['error'])){
                if($_SESSION['error']==1){
                    echo '
                    <h6 class="text-center mb-2" style="color:red">Unesite tražene parametre i pokušajte ponovno!</h6>
                        ';
                }
                if($_SESSION['error']==2){
                    echo '
                    <h6 class="text-center mb-2" style="color:red">Korisnik s unesenom e-mail adresom već postoji.
                        <br>Molimo pokušajte s drugom e-mail adresom.</h6>
                        ';
                }
                if($_SESSION['error']==3){
                    echo '
                    <h6 class="text-center mb-2" style="color:red">Lozinka mora sadržavati minimalno 8 znakova!</h6>
                        ';
                }
                if($_SESSION['error']==4){
                    echo '
                    <h6 class="text-center mb-2" style="color:red">Pogrešan unos lozinke.<br>
                        Obratite pozornost na korektan unos lozinke prilikom 
                        ponovnog unosa iste.</h6>
                        ';
                }
                if($_SESSION['error']==5){
                    echo '
                    <h6 class="text-center mb-2" style="color:red">E-mail nije zapisan u standardnom obliku koristeći
                        postojeću domenu.<br>Molimo pokušajte s drugom e-mail adresom.</h6>
                        ';
                }
            }
            unset($_SESSION['error']);
        ?>
        <form action="/phpInc/registration.inc.php" method="POST">
            <div class="form-group">
                <label for="name">Ime: </label>
                <input type="text" class="form-control" 
                    placeholder="Unesite Vaše ime" id="name" name="name" >
            </div>
            <div class="form-group">
                <label for="surname">Prezime: </label>
                <input type="text" class="form-control" 
                    placeholder="Unesite Vaše prezime" id="surname" name="surname" >
            </div>
            <div class="form-group">
                <label for="date">Datum rođenja: </label>
                <input type="date" class="form-control" 
                    id="date" max="2020-03-15" min="1950-01-01" name="date" >
            </div>
            <div class="form-group">
                <label for="country">Odaberite državu odakle dolazite: </label>
                <select class="form-control" id="country" name="country" >
                    <option value="">Nije odabrano</option>
                    <option value="Hrvatska">Hrvatska</option>
                    <option value="Bosna i Hercegovina">Bosna i Hercegovina</option>
                    <option value="Srbija">Srbija</option>
                    <option value="Sjeverna Makedonija">Sjeverna Makedonija</option>
                    <option value="Crna Gora">Crna Gora</option>
                    <option value="Crna Gora">Slovenija</option>
                    <option value="Crna Gora">Kosovo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email adresa: </label>
                <input type="email" class="form-control" 
                    placeholder="Unesite validnu email adresu" id="email" name="email" >
                    <span class="error">* nepostojeće e-mail adrese neće biti prihvaćene</span>
            </div>
            <div class="form-group">
                <label for="password">Lozinka: </label>
                <input type="password" class="form-control" 
                    placeholder="Unesite lozinku" id="password" name="password" >
                <span class="error">* min 8 znakova</span>
            </div>
            <div class="form-group">
                <label for="password2">Potvrdite lozinku: </label>
                <input type="password" class="form-control" 
                    placeholder="Unesite ponovno odabranu lozinku" id="password2" name="passwordConfirm" >
            </div>
            <hr>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" value="" name="rules" >
                        Prihvaćam uvjete i pravila definirana u registracijskom ugovoru.
                        <br><span class="error">* preporučujemo da pročitate ugovor</span>
                </label>

                    <!--Gumb za otvaranje ugovora-->
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal">
                        Registracijski ugovor</button>

                <!--Modal-->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                        <!--Modal header-->
                            <div class="modal-header bg-primary">
                                <h4 class="modal-tittle text-white">Registracijski ugovor</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        <!--Modal body-->
                            <div class="modal-body bg-light">
                                <p>
                                    Da bi registracija bila uspješna, morate unesti Vaše ime i prezime, datum rođenja,
                                    državu odakle dolazite, valjanu e-mail adresu te lozinku.<br>
                                    Za korisnički račun na SBD platformi suglasni ste da nikada 
                                    nećete otkriti lozinku apsolutno nikome kao ni administratorima.
                                    Lozinke su kriptirane pa tako ni administratori nemaju uvid u njih ukoliko ste mislili suprotno.
                                    Navedena mjera postoji isključivo radi Vaše sigurnosti i neospornosti Vaših komentara 
                                    i reakcija na ankete. Također prihvaćate da nikada nećete koristiti korisnički račun 
                                    druge osobe iz bilo kojeg razloga.<br><br>
                                    Također je preporuka korištenje relativno kompleksne i jedinstvene lozinku za Vaš račun, 
                                    sve s ciljem sprječavanja provala i zlouporabe korisničkog računa.
                                    Vaša je odgovornost da pružite točne i čiste informacije. Svaka informacija za 
                                    koju vlasnik ili osoblje SBD platforme utvrdi da je netočna ili vulgarne prirode 
                                    biti će uklonjena, s ili bez prethodne obavijesti.<br>
                                    Imajte na umu da sa svakom objavom bilježimo Vašu IP adresu, za slučaj da 
                                    morate biti isključeni iz rada web stranice ili da moramo obavijestiti Vašeg ISP-a. To će se 
                                    dogoditi samo u slučaju teškog kršenja ovog Ugovora.
                                </p>
                                <hr>
                                <p class="text-center" style="font-weight:bold;">Vaša SBD administracija!</p>
                            </div>
                            <!--Modal footer-->
                            <div class="modal-footer">
                                <button type="button" class="close" data-dismiss="modal">Zatvori</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" value="" name="notify">
                        Želim primati sve obavijesti o novim utakmicama i vijestima putem e-maila.
                </label>
            </div>
            <hr>
            <div class="to-do-buttons mt-3 mb-5">
                <a class="btn btn-danger" href="index.php" role="button">Natrag na početnu</a>
                <button name ="submit" type="submit" class="btn btn-primary float-right">Kreiraj račun</button>
            </div>
        </form>
    </div>

</body>
</html>