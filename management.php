<?php
session_start();
include 'funkce.php';
usersConnect();
$dbtable = $_SESSION["conn"]->query("SELECT * FROM login");
echo ("<h1>Seznam zaměstnanců:</h1>");
echo ("<table border='1px'>
<tr>
<th>jméno</th>
<th>uživ. jméno</th>
<th>heslo</th>
<th>manažer</th>
<th>vedoucí</th>
<th>prodavač</th>
<th>skladník</th>
</tr>");

while($row = mysqli_fetch_array($dbtable))
{
echo ("<tr>");
echo ("<td>" . $row['names'] . "</td>");
echo ("<td>" . $row['username'] . "</td>");
echo ("<td>" . $row['passwords'] . "</td>");
echo ("<td>" . $row['manazer'] . "</td>");
echo ("<td>" . $row['vedouci'] . "</td>");
echo ("<td>" . $row['prodavac'] . "</td>");
echo ("<td>" . $row['skladnik'] . "</td>");
echo ("</tr>");
}
echo ("</table>");
echo ("<br>");
?>
<a href="addUser.php" target="_parent">Vytvoření nového uživatele</a><br><br>
<a href="deleteUser.php">Smazání uživatele</a><br><br>
<a href="Menu.php">Zpět do Hlavního menu</a><br><br>

