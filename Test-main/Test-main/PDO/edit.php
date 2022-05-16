<?php	
require_once("conn.php");
require_once("session.inc.php");
	$pdo_statement = $conn->prepare("SELECT * FROM beroeps_oefen WHERE ID=" . $_GET['ID']);
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
?>
<div style="text-align:right;margin:20px 0px;"><a href="user_new.php" class="button_link"> Create</a></div>

	<?php
    
	if(!empty($result)) { 
		foreach($result as $row) {
	?>
    <form name="frmAdd" action="edit_verwerk.php" method="POST">
    <div class="demo-form-row">
	  <label>ID: </label><br>
	  <input type="text" name="ID" class="demo-form-field" value="<?php echo $row["ID"]; ?>" readonly />
  </div>
  <div class="demo-form-row">
	  <label>Gebruikersnaam: </label><br>
	  <input type="text" name="Gebruikersnaam" class="demo-form-field" value="<?php echo $row["Gebruikersnaam"]; ?>" required />
  </div>
  <div class="demo-form-row">
	  <label>Wachtwoord: </label><br>
	  <input type="password" name="Wachtwoord" class="demo-form-field" value="<?php echo $row["Wachtwoord"]; ?>" readonly />
  </div>
  <div class="demo-form-row">
	  <input name="submit" type="submit" value="Submit" class="demo-form-submit">
  </div>
  </form>

    <?php
		}
	}

	?>
</body>