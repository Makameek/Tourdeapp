<?php
include 'funkce.php';
usersConnect();
if($_SERVER['REQUEST_METHOD'] == "POST")
	{
 $delval = $_POST["delete"];
 $sql = "DELETE FROM `login` WHERE username='$delval'";
 $dp = mysqli_query($_SESSION["conn"], $sql);
    if ($dp) { 
     echo ("Smazání proběhlo úspěšně.");
    }
     else {
       echo("Nic se nestalo, zadali jste špatné údaje.");
     }
  }
?>
  <form name="deleteForm" method="post">
    <label for="delete">Zadejte Uživatelské jméno uživatele, kterého si přejete smazat:<br><br></label>   
  <input type="text" name="delete" id="delete"/>
  <input type="Submit" name="delbutton" id="Submit" value="Smazat" />
 </form>
 <br> <br>
 <a href="management.php">Zpět do správy uživatelů</a><br><br>
