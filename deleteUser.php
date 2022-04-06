<?php
include 'funkce.php';
usersConnect();
echo("Ferda");
 $delval = $_POST["delete"];
 $sql = "DELETE FROM `login` WHERE name='$delval';";
 $dp = mysqli_query($conn, $sql);
    if ($dp) { 
     echo ("Smazání proběhlo úspěšně.");
    }
     else {
       echo("Nic se nestalo, zadali jste špatné údaje.");
     }
?>