<?php
require_once("conn.php");
require_once("session.inc.php");
$pdo_statement=$conn->prepare("DELETE FROM beroeps_oefen WHERE ID=" . $_GET['ID']);
$pdo_statement->execute();
header('location:index.php');
?>