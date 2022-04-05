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
    $resultUN = $_SESSION["conn"]->query("SELECT username FROM login WHERE username='$username' AND passwords='$password'");
    
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
  if(isset($_POST['sklad']))
   {
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
  } ?>
  <form method="post">
  <input type="submit" name="sklad" value="Sklad">
 </form>
  
 <?php }
function toPokladna() {
  if($_SESSION["roles"]['manazer'] == "Ano" or $_SESSION["roles"]['vedouci'] == "Ano") { ?>
    <form action="pokladnaManazer.php">
      <input type="submit" value="Pokladna">
    </form>
 <?php }
 elseif($_SESSION["roles"]['prodavac'] == "Ano") { ?>
  <form action="pokladnaProdavac.php">
    <input type="submit" value="Pokladna">
  </form>
 <?php }
 }
function toKalendar() {
  if($_SESSION["roles"]['manazer'] == "Ano") { ?>
    <form action="kalendarManazer.php">
      <input type="submit" value="Kalendář">
    </form>
 <?php }
 elseif($_SESSION["roles"]['vedouci'] == "Ano") { ?>
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
  if(isset($_POST['management']))
   {
  $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $toManagement = 'management.php';
  header("Location: http://$host$uri/$toManagement");
  exit;
  }

  if($_SESSION["roles"]['manazer'] == "Ano") { ?>
    <form method="post">
      <input type="submit" name="management" value="Správa uživatelů">
    </form>
 <?php }
 } 


?>
 