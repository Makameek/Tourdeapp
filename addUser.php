<?php
session_start();
include 'funkce.php';
$_POST["formManazer"] = 0;
$_POST["formVedouci"] = 0;
$_POST["formProdavac"] = 0;
$_POST["formSkladnik"] = 0;

if($_SERVER['REQUEST_METHOD'] == "POST")
{

$addNames=$_POST["formnames"];
$addUsername=$_POST["formusername"];
$addPassword=$_POST["formpassword"];

if($_POST["formManazer"]=="Ano") {
    $addManazer = "Ano";
} else {
    $addManazer = "Ne";
}
 if($_POST["formVedouci"]=="Ano") {
    $addVedouci = "Ano";
} else {
    $addVedouci = "Ne";
}
 if($_POST["formProdavac"]=="Ano") {
    $addProdavac = "Ano";
} else {
    $addProdavac = "Ne";
}
 if($_POST["formSkladnik"]=="Ano") {
    $addSkladnik = "Ano";
 } else {
    $addSkladnik = "Ne";
 }
 
		if(!empty($addNames) && !empty($addPassword) && !is_numeric($addUsername ))
		{
            usersConnect();
			$query = "INSERT INTO login (names,username,passwords,manazer,vedouci,prodavac,skladnik) VALUES ('$addNames','$addUsername','$addPassword','$addManazer','$addVedouci','$addProdavac','$addSkladnik')";

			mysqli_query($_SESSION["conn"], $query);
            
			header("Location: management.php");
			die;
		} else
		{
			echo "Prosím, vyplňte všechny údaje a alespoň jednu roli!";
		}
   

}
   
   
	

?>

    <form name="addUser" method="post">
    <fieldset>
     <legend>Pro přidání nového uživatele zadejte alespoň 1 roli a použijte nové přihlašovací jméno!</legend> 
      <label for="formnames">Celé jméno:</label>
       <input type="text" name="formnames" id="formnames">
       <br>
       <label for="formusername"> Uživatelské jméno:</label>
       <input type="text" name="formusername" id="formusername">
       <br>
       <label for="formpassword"> Heslo:</label>
       <input type="password" name="formpassword" id="formpassword">
       <br>
       <label for="formManazer"> Manažer</label>
       <input type="checkbox" id="formManazer" name="formManazer" value="Ano"><br>
       <label for="formVedouci"> Vedoucí</label>
       <input type="checkbox" id="formVedouci" name="formVedouci" value="Ano"><br>
       <label for="formProdavac"> Prodavač</label>
       <input type="checkbox" id="formProdavac" name="formProdavac" value="Ano"><br>
       <label for="formSkladnik"> Skladník</label>
       <input type="checkbox" id="formSkladnik" name="formSkladnik" value="Ano"><br>
       <br>
       <input type="submit" value="Potvrdit" name="potvrdit">
    </fieldset>  
   </form>
   <a href="management.php">Zpět do správy uživatelů</a><br><br>
   

