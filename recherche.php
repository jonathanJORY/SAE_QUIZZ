20.2 Recherche avec PreparedStatement
<!doctype html>
<html>
<head>
<title>
Recherche d'une personne par ID
</title>
<meta charset="utf-8">
</head>
<body>
<?php $wanted=$_GET['questionID'];
if (!empty($wanted)){
    echo "<h1>Recherche de $wanted </h1>";
    require_once('connexion.php');
    $connexion=connect_bd();
    $sql="SELECT * from QUESTION where questionID=:id";
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
        foreach ($stmt as $row)
            echo $row['questionID']."'>".$row['questionText']." ".$row['questionType']."<br/>"; 
    }
}
?>
</body>
</html>