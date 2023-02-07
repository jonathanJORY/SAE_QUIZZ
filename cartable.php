
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
$sql="SELECT questionID, questionText, questionType FROM QUESTION";
$stmt = $connexion->query($sql);

if(!$stmt) echo "Pb d'accès au CARNET";
else {
?>
<form action="repondreQuestion.php" method="GET">
<select name="questionID">
<?php
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if (!empty($row['questionID'])) {
        echo "<option value='".$row['questionID']."'>".$row['questionText']." ".$row['questionType']."</option>\n";
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