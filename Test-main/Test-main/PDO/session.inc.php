<?php
session_start();

if (!isset($_SESSION['Gebruikersnaam']))
{
	header("location:login.php");
}
?>