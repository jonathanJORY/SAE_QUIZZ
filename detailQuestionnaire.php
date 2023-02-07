<!doctype html>
<html>
<head>
<title>
Recherche d'une personne par ID
</title>
<meta charset="utf-8">
</head>
<body>
<?php $wanted=$_GET['questionnaireID'];
if (!empty($wanted)){
    require_once('connexion.php');
    $connexion=connect_bd();
    $sql="SELECT * from QUESTIONNAIRE where questionnaireID=:id";
    $stmt=$connexion->prepare($sql);
    $stmt->bindParam(':id', $wanted, PDO::PARAM_INT);
    try {
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Erreur lors de l'exécution de la requête : " . $e->getMessage();
    }
    if (!$stmt)
        echo "Pb d'accès au Question";
    else{
        foreach ($stmt as $row){
            echo "<h2> Questionnaire n°".$row['questionnaireID']." Nom:".$row['questionnaireName']." \n".$row['questionnaireDescription']."</h2>";
        }
        $contenir="SELECT * from CONTENIR where questionnaireID=:id";
        $requete=$connexion->prepare($contenir);
        
        $requete->bindParam(':id', $wanted, PDO::PARAM_INT);
        $requete->execute();
        foreach ($requete as $ligne){
            $sql="SELECT * from QUESTION where questionID=:id";
            $stmt=$connexion->prepare($sql);
            $stmt->bindParam(':id', $ligne['questionID'], PDO::PARAM_INT);
            $stmt->execute();
            foreach ($stmt as $row){
                echo "<h3>Question n°".$row['questionID'].">".$row['questionText']." Type :".$row['questionType']."</h3>";
            }
            $sql="SELECT * from REPONSE where questionID=:id";
            $stmt=$connexion->prepare($sql);
            $stmt->bindParam(':id', $ligne['questionID'], PDO::PARAM_INT);
            $stmt->execute();
            echo "Réponses possible:\n";
            foreach ($stmt as $row){
                echo $row['reponseText'].">";
                    if($row['correct']==1){
                        echo "bonne Réponse"."<br/>";}
                    else{
                        echo "mauvaise réponses"."<br/>";
                    }
            }
        }
    }
    echo("<input type='button' name=$wanted value='Modifier'");
}
?>
</body>
</html>