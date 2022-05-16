<?php
require_once("conn.php");
require_once("session.inc.php");
?>
<html>
<head>
<title>PHP PDO CRUD</title>
<style>
body{width:615px;font-family:arial;letter-spacing:1px;line-height:20px;}
.tbl-qa{width: 100%;font-size:0.9em;background-color: #f5f5f5;}
.tbl-qa th.table-header {padding: 5px;text-align: left;padding:10px;}
.tbl-qa .table-row td {padding:10px;background-color: #FDFDFD;vertical-align:top;}
.button_link {color:#FFF;text-decoration:none; background-color:#428a8e;padding:10px;}
</style>
</head>
<body>
<?php	
	$pdo_statement = $conn->prepare("SELECT * FROM beroeps_oefen ORDER BY ID DESC");
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
?>
<div style="text-align:left;margin:20px 0px;"><a href="logout.php" class="button_link"> Logout</a></div>
<table class="tbl-qa">
  <thead>
	<tr>
	  <th class="table-header" width="20%">ID</th>
	  <th class="table-header" width="40%">Gebruikersnaam</th>
	  <th class="table-header" width="20%">Wachtwoord</th>
	</tr>
  </thead>
	<?php
	if(!empty($result)) { 
		foreach($result as $row) {
		 if($_SESSION['Gebruikersnaam'] == 'Admin')
		 {
			echo "<tr class='table-row'>";
			echo"<td>" . $row['ID'] . "</td>";
			echo"<td>" . $row['Gebruikersnaam'] . "</td>";
			echo"<td>" . $row['Wachtwoord'] . "</td>";
			echo "<td> <a href='edit.php?ID=".$row['ID']." 'class='button_link' >Edit</a></td>";
			echo "<td> <a href='delete.php?ID=".$row['ID']."'class='button_link'>Delete</a></td>";
			echo "<td><a href='user_new.php' class='button_link'>Create</a></td>";
			echo "</tr>";
		 }else{
			echo "<tr class='table-row'>";
			echo"<td>" . $row['ID'] . "</td>";
			echo"<td>" . $row['Gebruikersnaam'] . "</td>";
			echo"<td>" . $row['Wachtwoord'] . "</td>";
			echo "</tr>";
		 }
		
		}
	}
	?>
</table>
</body>
</html>