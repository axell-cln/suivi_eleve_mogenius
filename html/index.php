<?php

$host="tcp-mo6.mogenius.io:56912";
$user="mysqluser";
$pass="axel";
$base="mysqldb";


  // Connexion au serveur MySQL
  $id=mysqli_connect($host,$user,$pass) or die("Impossible de se connecter au serveur : $host");

  // Suppression / Creation / Selection de ma bdd "vaccin"

  $resultat=mysqli_query($id, "CREATE DATABASE IF NOT EXISTS $base ");
  mysqli_select_db($id, $base) or die("Impossible de selectionner la base : $base");


  // Creation de la table PERSONNE


  $resultat=mysqli_query($id, "CREATE TABLE IF NOT EXISTS PERSONNE 
                        (id int(3) PRIMARY KEY AUTO_INCREMENT NOT NULL,
                          nom char(20) NOT NULL default '',
                         age int(3) NOT NULL default '0',
                       ) ;");

                       // Insertions des 10 personnes
                       $resultat=mysqli_query($id, "INSERT INTO PERSONNE VALUES ('Coulon.A',20)  ON DUPLICATE KEY UPDATE id = 1;");
                      $resultat=mysqli_query($id, "INSERT INTO PERSONNE VALUES ('Lee.H',27) ON DUPLICATE KEY UPDATE id = 2;");
                       $resultat=mysqli_query($id, "INSERT INTO PERSONNE VALUES ('rodain.D',30) ON DUPLICATE KEY UPDATE id = 3;");
                       $resultat=mysqli_query($id, "INSERT INTO PERSONNE VALUES ('Bertrand.B',25) ON DUPLICATE KEY UPDATE id = 4;");


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>suive eleve</title>
</head>
<body>
<h2>Liste des élèves : </h2>
<?php   $resultat=mysqli_query($id, "SELECT * FROM PERSONNE;");
foreach($resultat as $resultat){
    echo $resultat["nom"]."<br>";
}
?>
<form METHOD="GET" ACTION="ajouter_eleve.php">
<input type="text" placeholder="Nom de l'élève" name="nom">
<input type="submit">
</form>

</form>
</body>
</html>