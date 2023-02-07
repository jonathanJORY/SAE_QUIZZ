
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
Interrogation de la table QUESTIONNAIRE avec PDO
</h1>
<?php
require_once('connexion.php');
$connexion=connect_bd();
$sql="SELECT questionnaireID, questionnaireName, questionnaireDescription FROM QUESTIONNAIRE";
$stmt = $connexion->query($sql);

if(!$stmt) echo "Pb d'accès au CARNET";
else {
?>
<form action="detailQuestionnaire.php" method="GET">
<select name="questionnaireID">
<?php
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if (!empty($row['questionnaireID'])) {
        echo "<option value='".$row['questionnaireID']."'>".$row['questionnaireName']." ".$row['questionnaireDescription']."</option>\n";
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