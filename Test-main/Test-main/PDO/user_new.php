<?php
if(!empty($_POST["submit"])) {
	require_once("conn.php");
	require_once("session.inc.php");
	$sql = "INSERT INTO beroeps_oefen ( Gebruikersnaam, Wachtwoord ) VALUES ( :Gebruikersnaam, :Wachtwoord )";
	$pdo_statement = $conn->prepare( $sql );
    $result = $pdo_statement->execute( array( ':Gebruikersnaam'=>$_POST['Gebruikersnaam'], ':Wachtwoord'=>sha1($_POST['Wachtwoord'] )) );

	if (!empty($result) ){
	  header('location:index.php');
	}
}
?>
<html>
<head>
<title>ADD</title>
</head>
<body>
<div style="margin:20px 0px;text-align:right;"><a href="index.php" class="button_link">Back to List</a></div>
<div class="frm-add">
<h1 class="demo-form-heading">Add User</h1>
<form name="frmAdd" action="<?=htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
  <div class="demo-form-row">
	  <label>Gebruikersnaam: </label><br>
	  <input type="text" name="Gebruikersnaam" class="demo-form-field" required />
  </div>
  <div class="demo-form-row">
	  <label>Wachtwoord: </label><br>
	  <input type="password" name="Wachtwoord" class="demo-form-field" required />
  </div>
  <div class="demo-form-row">
	  <input name="submit" type="submit" value="Submit" class="demo-form-submit">
  </div>
  </form>
</div> 
</body>