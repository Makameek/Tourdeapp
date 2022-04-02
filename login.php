<?php
include 'funkce.php';
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
     <input type="submit" value="Přihlásit se" name="submit">
    </form> 
</div>

</body>
</html>

<?php
if(isset($_POST['submit']))
{
    verifyToken();
}
?>