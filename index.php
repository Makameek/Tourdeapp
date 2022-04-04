<?php
 $servername = "localhost";
 $username = "root";
 $password = "";

 $con = new mysqli($servername, $username, $password);

 $sql2 = "CREATE DATABASE IF NOT EXISTS users";
 if ($con->query($sql2) === TRUE) {
  $con->close();
 }
 include 'funkce.php';
 session_start();
 usersConnect();

     $sql = "CREATE TABLE IF NOT EXISTS`login`(ID int NOT NULL PRIMARY KEY, names VARCHAR(30), username VARCHAR(30) NOT NULL, passwords VARCHAR(30) NOT NULL, manazer VARCHAR(50), vedouci VARCHAR(50), prodavac VARCHAR(50), skladnik VARCHAR(50))";
     if ($_SESSION["conn"]->query($sql) === TRUE) {
        $adminCreate = "INSERT IGNORE INTO login(`names`, `username`, `passwords`, `manazer`, `vedouci`, `prodavac`, `skladnik`) VALUES ('admin','admin','admin','Ano','Ano','Ano','Ano')";
       if($_SESSION["conn"]->query($adminCreate) === TRUE) {
           $_SESSION["switch"] = 1;
        header("Location: login.php");
       } 
      }     
?>
      