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
<?php $wanted=$_GET['ID'];
if (!empty($wanted)){
    echo "<h1>Recherche de $wanted </h1>";
    require_once('connexion.php');
    $connexion=connect_bd();
echo("bob");
$sql="SELECT * from QUESTION where questionID=:id";
$stmt=$connexion->prepare($sql);
$stmt->bindParam(':id', $_GET['questionID']);
$stmt->execute();
if (!$stmt)
    echo "Pb d'accès au CARNET";
else{
if ($stmt->rowCount()==0) echo "Inconnu !<br/>";
    else
        foreach ($stmt as $row)
            echo $row['questionID']."'>".$row['questionText']." ".$row['questionType']."<br/>";
}
}
?>
</body>
</html>