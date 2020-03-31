<?php

        session_start();
        if(isset($_POST['submit'])){

        include_once 'database.inc.php';

        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($email) || empty($password)){
            $_SESSION['error'] = 1;
            header("Location: ../login.php");
            exit();

        }else{
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if($resultCheck < 1){
                $_SESSION['error'] = 2;
                exit(header("Location: ../login.php"));

            }else{
                if($row = mysqli_fetch_assoc($result)){
                    $hashedPassword = password_verify($password, $row['passwrd']);

                    if($hashedPassword == false){
                        $_SESSION['error'] = 3;
                        exit(header("Location: ../login.php"));

                    }elseif($hashedPassword == true){
                        $_SESSION['firstname'] = $row['firstname'];
                        $_SESSION['lastname'] = $row['lastname'];
                        $_SESSION['date'] = $row['date'];
                        $_SESSION['country'] = $row['country'];
                        $_SESSION['email'] = $row['email'];

                        if(($row['id']==1) || ($row['id']==2)){
                            $_SESSION['adminLoggedIn']=true;
                        }

                        exit(header("Location: ../index.php?=loginSuccess"));
                    }
                }
            }
        }
    }
?>



