<?php 

 if(isset($_POST['submit'])){

    session_start();
    session_unset();
    session_destroy();

    if(isset($_SERVER['HTTP_REFERER'])){
       header("Location: ".$_SERVER['HTTP_REFERER']);   /*Ukoliko postoji mogućnost povratka ne prethodni subpage, vraća se*/
    }else{
      header("Location: ../index.php?=logoutSuccess");
    }

    exit();
 }