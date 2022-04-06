<?php

session_start();
if(!$_SESSION["switchSklad"]==1){
 $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $toSklad = 'createSklad.php';
  header("Location: http://$host$uri/$toSklad");
  exit;
 } 
echo("sklad manažer, vedoucí, prodavač");
if($_SESSION["switchSklad"]==1) {
    echo("databáze sklad existuje");
}
include 'funkce.php';

skladConnect();
$dbtable = $_SESSION["cons"]->query("SELECT * FROM prod");
echo ("<h1>Sklad:</h1>");
echo ("<table border='1px'>
<tr>
<th>Produkt</th>
<th>Počet</th>
</tr>");

while($row = mysqli_fetch_array($dbtable))
{
echo ("<tr>");
echo ("<td>" . $row['names'] . "</td>");
echo ("<td>" . $row['username'] . "</td>");
echo ("</tr>");
}
echo ("</table>");
echo ("<br>");
?>