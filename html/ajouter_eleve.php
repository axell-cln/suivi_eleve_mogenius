<?php 
$host="tcp-mo6.mogenius.io:56912";
$user="mysqluser";
$pass="axel";
$base="mysqldb";

$nom = $_GET['nom'];

  // on se connecte a la base
  $id=mysqli_connect($host,$user,$pass);
  mysqli_select_db($id, $base)
  or die("Impossible de selectionner la base : $base");
  
  $resultat=mysqli_query($id, "INSERT INTO PERSONNE VALUES ('$nom',20);");

  header('Location: index.php');

?>