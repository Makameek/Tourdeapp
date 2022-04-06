<?php
    include 'funkce.php';
    session_start();
    if($_SESSION["roles"] == 0) {
        header('Location: login.php');
    }
?>

<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles.css">
  <title>TDA Menu</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    <body>
        <div class = "menuBox1">
            <?php getStatus() ?>
            <div class = "menuBox2">                
                <?php
                    toSklad();
                    toPokladna();
                    toKalendar();
                    toManagement();
                ?>
            </div>
            <div class = "menuBox3">
                <div class = "menuBox4">
                    <div class = "menuLabel">
                        <span>Přihlášen</span>
                    </div>
                    <div class = "menuUser">
                        <?php
                            $user = $_SESSION["username"];
                            echo "$user";
                        ?>
                        <span>JanRačanský</span> 
                    </div>
                </div>
                <form action=logout.php>
                    <input type="submit" value="Odhlásit" name="logout" class = "menuButton">
                </form>
            </div>
        </div>
        <div class = "siteBox1">
            <img src="logoVelkePlank_trans.png" style="width: 70%;">
        </div>
    </body>
</html>