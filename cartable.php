
<!doctype html>
<html>
<head>
<title>
Connexion à SQLite avec PDO
</title>
<meta charset="utf-8">
</head>
<body>
<h1>
Interrogation de la table CARNET avec PDO
</h1>
<?php
require_once('connexion.php');
$connexion=connect_bd();
$sql="SELECT ID, PRENOM, NOM FROM CARNET";
$stmt = $connexion->query($sql);

if(!$stmt) echo "Pb d'accès au CARNET";
else {
?>
<form action="recherche.php" method="GET">
<select name="ID">
<?php
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if (!empty($row['NOM'])) {
        echo "<option value='".$row['ID']."'>".$row['PRENOM']." ".$row['NOM']."</option>\n";
    }
}
?>
</select>
<input type="submit" value="Rechercher">
</form>
<?php
}
?>
</body>
</html>