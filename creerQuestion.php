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
$numQuestion = isset($_POST['question_order']) ? $_POST['question_order'] : 1;

$nomQuestionnaire=$_POST['questionnaireName'];

require_once('connexion.php');
$connexion=connect_bd();

// Vérification s'il existe déjà un questionnaire avec le même nom
$stmt = $connexion->prepare("SELECT * FROM QUESTIONNAIRE WHERE questionnaireName = :questionnaireName");
$stmt->bindParam(':questionnaireName', $nomQuestionnaire);
$stmt->execute();
$questionnaire = $stmt->fetch();
if (!$questionnaire) {
// pas de Questionnaire existant avec le même nom
// Insertion du questionnaire
$descQuestionnaire=$_POST['questionnaireDescription'];
$sql = "INSERT INTO QUESTIONNAIRE (questionnaireName, questionnaireDescription) VALUES (?,?)";
$stmt = $connexion->prepare($sql);
$stmt->execute([$nomQuestionnaire, $descQuestionnaire]);
$questionnaireID = $connexion->lastInsertId();
}
//déja présent
else{
  $questionnaireID=$_POST['questionnaireID'];
}


echo "<h3> Questionnaire: $nomQuestionnaire </h3>";
echo "<h4> Question n°$numQuestion </h4>";
echo  "$questionnaireID";
?>
<form action="saveCreaQuestion.php" method="post">
    <!-- Ajout de l'id  du questionnaire -->
<?php 
echo  ("<input type='hidden' name='questionnaireID' value='$questionnaireID'");
?>
    
  <label for="question_title">Titre de la question:</label>
  <input type="text" id="question_title" name="question_title" required>

  <label for="question_type">Type de réponses:</label>

  <label for="question_type_multiple">Choix multiples</label>
  <input type="radio" id="question_type_multiple" name="question_type" value="multiple" required>
  
  <label for="question_type_unique">Choix unique</label>
  <input type="radio" id="question_type_unique" name="question_type" value="unique" required>
  
  <label for="question_type_libre">Réponse libre</label>
  <input type="radio" id="question_type_libre" name="question_type" value="libre" required>

  <div id="reponses_disponibles">
    <label for="reponse1">Réponse 1:</label>
    <input type="text" id="reponse1" name="reponse1">

    <label for="reponse2">Réponse 2:</label>
    <input type="text" id="reponse2" name="reponse2">

    <!-- Ajouter autant de champs de réponse que nécessaire -->
  </div>

  <input type="submit" value="Enregistrer">
</form>
