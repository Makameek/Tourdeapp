<?php
	session_start();
	include 'funkce.php';
	usersConnect();
	$dbtable = $_SESSION["conn"]->query("SELECT * FROM login");
?>

<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles.css">
  <title>TDA Směny Manažer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    <body>
        <div class = "menuBox1">
            <?php getStatus() ?>
            <div class = "menuBox2">                
                <?php
                    toSklad();
                    toPokladna();
                ?>
                <div class = "menuButtonBlack"><span>Směny</span></div>
                <?php
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
    </body>
</html>