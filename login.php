<?php
session_start();
include 'funkce.php';
$_SESSION["roles"] = 0;
?>

<html>
<head>
  <title>Login</title>
</head>
 <body>
  <div>
    <form action="login.php" method="post">
     <label for="username">Uživatelské jméno:</label>
     <input type="text" name="username" value="">
      <br>
     <label for="pass">Heslo:</label>
     <input type="password" name="password" value="">
      <br>
     <input type="submit" value="Přihlásit se" name="login">
    </form> 
  </div>
 </body>
</html>

<?php
if(isset($_POST['login'])) {
    usersConnect();
    verifyToken();
}
?>