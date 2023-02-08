<?php
    require_once("models.php");
    require_once("connexion.php");
    $connexion=connect_bd();
?>

<!doctype html>
<html>
<head>
    <title>
    Crée/modifier une question par ID
    </title>
    <meta charset="utf-8">
</head>
<body>
    
    <?php


    $id_questionnaire=$_GET["questionnaireID"];
    $orderQuestion = $_GET["orderQuestion"];
    if($orderQuestion == null){
        $sql="SELECT questionID from CONTENIR where questionnaireID=:id and questionOrder = 0";
        $orderQuestion = 0;
    }
    else{
        $sql="SELECT questionID from CONTENIR where questionnaireID=:id and questionOrder = $orderQuestion";
    }
    $stmt=$connexion->prepare($sql);
    $stmt->bindParam(":id", $id_questionnaire);
    $stmt->execute();
    foreach ($stmt as $row){
        $id_question = $row["questionID"];
    }
    $_SESSION[$id_questionnaire] = $id_question;
    echo ($id_question);
    
    $sql="SELECT * from QUESTION where questionID=:id";
    $stmt=$connexion->prepare($sql);
    $stmt->bindParam(":id", $id_question);
    $stmt->execute();
    if (!$stmt) echo "Pb d'accès aux QUESTIONs";
    else{
        foreach ($stmt as $row){
            $question_texte = $row["questionText"];
            $question_type = $row["questionType"];
        }
        // On Recupere ensuite les réponses de la question
        $sql="SELECT * from REPONSE where questionID=:id";
        $stmt=$connexion->prepare($sql);
        $stmt->bindParam(':id', $id_question, PDO::PARAM_INT);
        $stmt->execute();
        $reponses = array();
        foreach ($stmt as $row){
            $id_reponse = $row['reponseID'];
            $reponseText = $row['reponseText'];
            $reponses[$id_reponse] = $reponseText;
        }
    }
    echo"<form action='repondreQuestion.php' method='GET'>";
    //Avec les informations reccuillie on affiche les reponses
    echo $question_texte;
    if($question_type == "checkbox"){
        foreach($reponses as $idRep => $textRep){
            echo "<input type='checkbox' name='".$idRep."' id='".$idRep."' />";
            echo "<label for='".$idRep."'>".$textRep."</label>";
        }
    }
    else if($question_type == "radio"){
        foreach($reponses as $idRep => $textRep){
            echo "<input type='radio' name='".$id_question."' id='".$idRep."' />";
            echo "<label for='".$idRep."'>".$textRep."</label>";
        }
    }
    else if($question_type == "text"){
        foreach($reponses as $idRep => $textRep){
            echo "<input type='text' name='".$id_question."' id='".$idRep."' />";
            echo "<label for='".$idRep."'>".$textRep."</label>";
        }
    }
    $orderQuestion += 1;
    echo "<input type='hidden' name='questionnaireID' value='".$id_questionnaire."' />";
    echo "<input type='hidden' name='orderQuestion' value='Réponse : ' />";
    
    
        
    
    ?>
    <input type="submit" value="Suivant">
    </form>
</body>
</html>