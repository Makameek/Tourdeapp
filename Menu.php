<?php

include 'funkce.php';
session_start();
if($_SESSION["roles"] == 0) {
    header('Location: login.php');
}
toSklad();
toPokladna();
toKalendar();
toManagement();

?>
<form action=logout.php>
<input type="submit" value="Odhlásit se" name="logout">
</form>

