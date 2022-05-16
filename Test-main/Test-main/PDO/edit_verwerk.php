<?php
require_once("conn.php");
require_once("session.inc.php");
if(isset($_POST["submit"])) {
	$pdo_statement=$conn->prepare("UPDATE beroeps_oefen set Gebruikersnaam='" . $_POST[ 'Gebruikersnaam' ] . "' WHERE ID=" . $_POST["ID"]);
	$result = $pdo_statement->execute();
	if (!empty($result) ){
	  echo '<div class="alert alert-success">Data saved successfully.</div>';
        header('location:index.php');
      
	}
	else{
		echo '<div class="alert alert-danger">Data saving failed.</div>';
	}
}
?>