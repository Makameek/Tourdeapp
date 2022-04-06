<?php
session_start();
if($_SESSION["switch"] !== 1) {
header("Location: index.php");
}

include 'funkce.php';
$_SESSION["roles"] = 0;
?>

<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles.css">
  <title>TDA Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
  <body>
    <div class = "siteBox">
      <div class = "loginBox1">
        <p class = "loginHeader">Přihlášení</p>
        <div class = "loginBox2">
          <form action="login.php" method="post">
            <div class = "loginBox3">
              <div class = "loginBox5">
                <label for="username" class = "loginLabel">Uživatelské jméno</label>
                <input type="text" name="username" class = "loginBox6" value="">
              </div>
              <div class = "loginBox1">
                <label for="pass" class = "loginLabel">Heslo</label>
                <input type="password" name="password" class = "loginBox6" value="">
              </div>
            </div>
            <input type="submit" value="Přihlásit" name="login" class = "loginBox4">
          </form>
        </div>
        <?php
          if(isset($_POST['login'])) {
          usersConnect();
          verifyToken();
          }
        ?>
      </div>
    </div>
  </body>
</html>