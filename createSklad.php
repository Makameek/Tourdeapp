<?php
$servername = "localhost";
 $username = "root";
 $password = "";

 $con = new mysqli($servername, $username, $password);

 $sql2 = "CREATE DATABASE IF NOT EXISTS sklad";
 if ($con->query($sql2) === TRUE) {
  $con->close();
 }
 include 'funkce.php';
session_start();
skladConnect();
     $sql = "CREATE TABLE IF NOT EXISTS`prod`(product VARCHAR(60), qnt INT(30))";
     if ($_SESSION["cons"]->query($sql) === TRUE) {
         $_SESSION["switchSklad"]=1;
         
         if($_SESSION["roles"]['manazer'] == "Ano" or $_SESSION["roles"]['vedouci'] == "1" or $_SESSION["roles"]['prodavac'] == "Ano") {
            $toSklad = "skladManazer.php";
           }
         else { 
          $toSklad = "skladSkladnik.php";
         }
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("Location: http://$host$uri/$toSklad");
        exit;

       } 
?>       