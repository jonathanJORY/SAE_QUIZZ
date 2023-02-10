<?php
require_once('connexion.php');
$connexion=connect_bd();
// Récupération des données du formulaire
$question_title = $_POST['question_title'];
$question_type = $_POST['question_type'];
$reponses = array();
$questionnaireID = $_POST['questionnaireID'];

$stmt = $connexion->prepare("SELECT questionnaireName FROM QUESTIONNAIRE WHERE questionnaireID = :id");
$stmt->bindParam(':id', $questionnaireID);
$stmt->execute();
$result = $stmt->fetch();
$questionnaireName = $result['questionnaireName'];
if ($question_type !== 'libre') {
  for ($i = 1; $i <= count($_POST); $i++) {
    $reponse = $_POST['reponse' . $i];
    if (!empty($reponse)) {
      array_push($reponses, $reponse);
    }
    }
    }
    
    // Insertion de la question dans la table QUESTION
    $stmt = $connexion->prepare("INSERT INTO QUESTION (questionText, questionType) VALUES (:questionText, :questionType)");
    $stmt->bindParam(':questionText', $question_title);
    $stmt->bindParam(':questionType', $question_type);
    $stmt->execute();
    
    // Récupération de l'ID de la question créée
    $question_id = $connexion->lastInsertId();
    
    // Insertion des réponses dans la table REPONSE
    if ($question_type !== 'libre') {
    foreach ($reponses as $reponse) {
    $stmt = $connexion->prepare("INSERT INTO REPONSE (reponseText, questionID, correct) VALUES (:reponseText, :questionID, 0)");
    $stmt->bindParam(':reponseText', $reponse);
    $stmt->bindParam(':questionID', $question_id);
    $stmt->execute();
    }
    }
    // Récupération du numéro d'ordre de la dernière question dans le questionnaire
    $stmt = $connexion->prepare("SELECT MAX(questionOrder) as max_order FROM CONTENIR WHERE questionnaireID = :questionnaireID");
    $stmt->bindParam(':questionnaireID', $questionnaireID);
    $stmt->execute();
    $result = $stmt->fetch();
    $question_order = $result['max_order'] + 1;

    // Insertion de la question dans le questionnaire dans la table CONTENIR
    $stmt = $connexion->prepare("INSERT INTO CONTENIR (questionnaireID, questionID, questionOrder) VALUES (:questionnaireID, :questionID, :questionOrder)");
    $stmt->bindParam(':questionnaireID', $questionnaireID);
    $stmt->bindParam(':questionID', $question_id);
    $stmt->bindParam(':questionOrder', $question_order);
    $stmt->execute();
    ?>

    <form id="myform" action="creerQuestion.php" method="post">
        <input type="hidden" name="question_order" value="<?php echo $question_order; ?>">
        <input type="hidden" name="questionnaireID" value="<?php echo $questionnaireID; ?>">
        <input type="hidden" name="questionnaireName" value="<?php echo $questionnaireName; ?>">
    </form>
    
    <script type="text/javascript">
        document.getElementById("myform").submit();
    </script>

    