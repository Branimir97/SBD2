<?php

if(isset($_POST['submit'])){

    session_start();
    include_once 'database.inc.php';

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $date = $_POST['date'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];
    $rules = $_POST['rules'];
    $notification = $_POST['notify'];

    if(empty($name) || empty($surname) || empty($date) || empty($country) || empty($email) ||
         empty($password) || empty($passwordConfirm) ||(!isset($rules))){
        $_SESSION['error'] = 1;
        exit(header("Location: ../registration.php"));

    }else{
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0){
            $_SESSION['error'] = 2;
            exit(header("Location: ../registration.php"));

        }else{
            if(strlen($password) < 8){
                $_SESSION['error'] = 3;
                exit(header("Location: ../registration.php"));
            }
            else if($password != $passwordConfirm){
                $_SESSION['error'] = 4;
                exit(header("Location: ../registration.php"));
            }
            else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $_SESSION['error'] = 5;
                exit(header("Location: ../registration.php"));
            }
            else{
                $hashedPasswrd = password_hash($password, PASSWORD_DEFAULT);

                if(isset($notification)){
                    $sql = "INSERT INTO users (firstname, lastname, birthday, country, email, notify, passwrd) 
                        VALUES ('$name', '$surname', '$date', '$country', '$email', 1, '$hashedPasswrd');";
                    mysqli_query($conn, $sql);
                }
                else{
                    $sql = "INSERT INTO users (firstname, lastname, birthday, country, email, notify, passwrd) 
                    VALUES ('$name', '$surname', '$date', '$country', '$email', 0, '$hashedPasswrd');";
                    mysqli_query($conn, $sql);
                }

                $_SESSION['successRegistration'] = 1;
            
                $to = "$email";
                $subject = "Obavijest: Uspjesno ste se registrirali na SBD platformu";
                $message = "<h4>
                            Uspješno ste se registrirali na web stranicu najbolje organizacije na 
                            Balkanu koja prati Real Madrid C.F.<br>
                            Svakim danom ćemo se truditi biti što brži, samim time što bolji i točniji s ciljem poboljšanja usluge,
                            jer ovo sve radimo samo i isključivo zbog Vas.<br></h4>
                            <h3>Pronađite nas na web lokaciji <a href='https://sbdrustvo.com/'>sbdrustvo.com</a>
                            <br><br>Vaš SBD Admin Team!";
                $headers = "From: sbdpodrska@gmail.com \r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

                mail($to, $subject, $message, $headers);
                exit(header("Location: ../login.php?=registration-Success"));
            }
        }
    }
}