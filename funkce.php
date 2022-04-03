<?php
function usersConnect() {
    $conn = 0;
    $dbservername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $database = "users";
   
    $_SESSION["conn"] = new mysqli($dbservername, $dbusername, $dbpassword, $database);
    if ($_SESSION["conn"]->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
  
   }

function verifyToken(){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $resultUN = $_SESSION["conn"]->query("SELECT username FROM login WHERE username='$username' AND password='$password'");
    
    if(mysqli_num_rows($resultUN) > 0) {
       $roleresult = $_SESSION["conn"]->query("SELECT manazer, vedouci, prodavac, skladnik FROM login WHERE username='$username'");


        $_SESSION["roles"] = $roleresult->fetch_assoc();
        
        

        header('Location: Menu.php'); 
    }
    else {
        echo("Špatné jméno, nebo heslo.");
    }

    $_SESSION["conn"]->close();
   }   

function toSklad() {
  if($_SESSION["roles"]['manazer'] == "1" or $_SESSION["roles"]['vedouci'] == "1" or $_SESSION["roles"]['prodavac'] == "1") { ?>
    <form action="skladManazer.php">
      <input type="submit" value="Sklad">
    </form>
 <?php }
 else { ?>
  <form action="skladSkladnik.php">
    <input type="submit" value="Sklad">
  </form>
 <?php }
 }
function toPokladna() {
  if($_SESSION["roles"]['manazer'] == "1" or $_SESSION["roles"]['vedouci'] == "1") { ?>
    <form action="pokladnaManazer.php">
      <input type="submit" value="Pokladna">
    </form>
 <?php }
 elseif($_SESSION["roles"]['prodavac'] == "1") { ?>
  <form action="pokladnaProdavac.php">
    <input type="submit" value="Pokladna">
  </form>
 <?php }
 }
function toKalendar() {
  if($_SESSION["roles"]['manazer'] == "1") { ?>
    <form action="kalendarManazer.php">
      <input type="submit" value="Kalendář">
    </form>
 <?php }
 elseif($_SESSION["roles"]['vedouci'] == "1") { ?>
  <form action="kalendarVedouci.php">
    <input type="submit" value="Kalendář">
  </form>
 <?php } 
 else { ?>
  <form action="kalendarProdavac.php">
    <input type="submit" value="Kalendář">
  </form>
 <?php }
 }
function toManagement() {
  if($_SESSION["roles"]['manazer'] == "1") { ?>
    <form action="management.php">
      <input type="submit" value="Správa uživatelů">
    </form>
 <?php }
 }  
?>