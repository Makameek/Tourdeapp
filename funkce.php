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
        ?>
          <div class = "errBox1 order3">
            <span>Špatné jméno nebo heslo</span>
          </div>
        <?php
    }

    $_SESSION["conn"]->close();
   }   

function toSklad() {
  if($_SESSION["roles"]['manazer'] == "Ano" or $_SESSION["roles"]['vedouci'] == "1" or $_SESSION["roles"]['prodavac'] == "Ano") { ?>
    <form action="skladManazer.php">
      <input type="submit" value="Sklad" class = "menuButton order1">
    </form>
 <?php }
 else { ?>
  <form action="skladSkladnik.php">
    <input type="submit" value="Sklad" class = "menuButton order1">
  </form>
 <?php }
 }
function toPokladna() {
  if($_SESSION["roles"]['manazer'] == "Ano" or $_SESSION["roles"]['vedouci'] == "Ano") { ?>
    <form action="pokladnaManazer.php">
      <input type="submit" value="Pokladna" class = "menuButton order2">
    </form>
 <?php }
 elseif($_SESSION["roles"]['prodavac'] == "Ano") { ?>
  <form action="pokladnaProdavac.php">
    <input type="submit" value="Pokladna" class = "menuButton order2">
  </form>
 <?php }
 }
function toKalendar() {
  if($_SESSION["roles"]['manazer'] == "Ano") { ?>
    <form action="kalendarManazer.php">
      <input type="submit" value="Směny" class = "menuButton order3">
    </form>
 <?php }
 elseif($_SESSION["roles"]['vedouci'] == "Ano") { ?>
  <form action="kalendarVedouci.php">
    <input type="submit" value="Směny" class = "menuButton order3">
  </form>
 <?php } 
 else { ?>
  <form action="kalendarProdavac.php">
    <input type="submit" value="Směny" class = "menuButton order3">
  </form>
 <?php }
 }
function toManagement() {
  if($_SESSION["roles"]['manazer'] == "Ano") { ?>
    <form action="management.php">
      <input type="submit" value="Účty" class = "menuButton order4">
    </form>
 <?php }
 } 
function todeleteUser() { ?>
  <form name="deleteForm" method="post" action="deleteUser.php">
  <input type="text" name="delete" value="Zadejte jméno" />
  <input type="Submit" name="delbutton" id="Submit" value="Smazat" />
 </form>
 <?php
 }
function getStatus() {
  if($_SESSION["roles"]['manazer'] == "Ano") { ?>
    <div class = "menuHeader">
      <span>Manažer</span>
    </div>
  <?php }
  elseif($_SESSION["roles"]['vedouci'] == "Ano") { ?>
    <div class = "menuHeader">
      <span>Vedoucí směny</span>
    </div>
  <?php } 
  elseif($_SESSION["roles"]['skladnik'] == "Ano") { ?>
    <div class = "menuHeader">
      <span>Skladník</span>
    </div>
  <?php }
  elseif($_SESSION["roles"]['prodavac'] == "Ano") { ?>
    <div class = "menuHeader">
      <span>Prodavač</span>
    </div>
  <?php }
}
?>