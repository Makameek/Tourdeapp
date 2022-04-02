<?php
function usersConnect() {
    $conn = 0;
    $dbservername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $database = "users";
   
    $conn = new mysqli($dbservername, $dbusername, $dbpassword, $database);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
   }

function verifyToken(){
    $conn = 0;
    $dbservername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $database = "users";
   
    $conn = new mysqli($dbservername, $dbusername, $dbpassword, $database);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    

    $username = $_POST["username"];
    $password = $_POST["password"];
    $resultUN = $conn->query("SELECT username FROM login WHERE username='$username'");
    
    if($resultUN && mysqli_num_rows($resultUN) > 0) {
        echo("spravne prihlasovaci jmeno");
    }
    else {
        echo("spatne");
    }

    $conn->close();
   }   


?>