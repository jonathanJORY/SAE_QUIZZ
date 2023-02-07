<!doctype html>
<html>
<head>
<title>
creer question
</title>
<meta charset="utf-8">
</head>
<body>
<?php 
$nomQuestionnaire=$_POST['questionnaireName'];
$descQuestionnaire=$_POST['questionnaireDescription'];
require_once('connexion.php');
$connexion=connect_bd();
$sql = "INSERT INTO QUESTIONNAIRE (questionnaireName, questionnaireDescription) VALUES (?,?)";
$stmt = $connexion->prepare($sql);
$stmt->execute([$nomQuestionnaire, $descQuestionnaire]);
echo "<h3> $nomQuestionnaire </h3>";
?>
</body>
</html>