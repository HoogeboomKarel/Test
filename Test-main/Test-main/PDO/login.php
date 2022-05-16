<?php
  session_start();
//Database Configuration File
require_once('conn.php');
error_reporting(0);
  if(isset($_POST['submit']))
  {
    // Getting username/ email and password
    $Gebruikersnaam= $_POST['Gebruikersnaam'];
    $Wachtwoord=sha1($_POST['Wachtwoord']);
    // Fetch data from database on the basis of username/email and password
    $query ="SELECT Gebruikersnaam, Wachtwoord FROM beroeps_oefen WHERE Gebruikersnaam=:Gebruikersnaam AND Wachtwoord=:Wachtwoord";
    $stmt= $conn -> prepare($query);
    $stmt-> bindParam(':Gebruikersnaam', $Gebruikersnaam, PDO::PARAM_STR);
    $stmt-> bindParam(':Wachtwoord', $Wachtwoord, PDO::PARAM_STR);
    $stmt-> execute();
    $results=$stmt->fetchAll(PDO::FETCH_OBJ);
  if($stmt->rowCount() > 0)
  {
    $_SESSION['Gebruikersnaam']=$_POST['Gebruikersnaam'];
    header("Location:index.php");
  } else{
    echo "Fout";
  }
}
?>


<form id="loginForm" action="<?=htmlentities($_SERVER['PHP_SELF']);?>"method="POST">
<div class="form-group">
<label>Gebruikersnaam: </label><br>
<input type="text" name="Gebruikersnaam" class="demo-form-field" required />
 <span class="help-block"></span>
 </div>
<div class="form-group">
<label>Wachtwoord: </label><br>
<input type="password" name="Wachtwoord" class="demo-form-field" required />
 <span class="help-block"></span>
</div>
<button type="submit" class="btn btn-success btn-block" name="submit">Submit</button>
</form>