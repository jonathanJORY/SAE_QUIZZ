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
$questionnaire_id = $connexion->lastInsertId();
echo "<h3> Questionnaire: $nomQuestionnaire </h3>";
?>
<form action="saveCreaQuestion.php" method="post">
    <!-- Ajout de l'id  du questionnaire -->
<?php 
echo  ("<input type='hidden' name='questionnaire_id' value='$questionnaire_id'");
?>
    
  <label for="question_title">Titre de la question:</label>
  <input type="text" id="question_title" name="question_title">

  <label for="question_type">Type de réponses:</label>
  <input type="radio" id="question_type_multiple" name="question_type" value="multiple">
  <label for="question_type_multiple">Choix multiples</label>

  <input type="radio" id="question_type_unique" name="question_type" value="unique">
  <label for="question_type_unique">Choix unique</label>

  <input type="radio" id="question_type_libre" name="question_type" value="libre">
  <label for="question_type_libre">Réponse libre</label>

  <div id="reponses_disponibles">
    <label for="reponse1">Réponse 1:</label>
    <input type="text" id="reponse1" name="reponse1">

    <label for="reponse2">Réponse 2:</label>
    <input type="text" id="reponse2" name="reponse2">

    <!-- Ajouter autant de champs de réponse que nécessaire -->
  </div>

  <input type="submit" value="Enregistrer">
</form>
