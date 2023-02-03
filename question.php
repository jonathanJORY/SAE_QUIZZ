<!doctype html>
<html>
<head>
    <title>
    Crée/modifier une question par ID
    </title>
    <meta charset="utf-8">
</head>
<body>
    <?php $wanted=$_GET["ID"];
        if (!empty($wanted)){
            echo "<h1>Recherche de $wanted </h1>";
        require_once("questions.php");
        $connexion=connect_bd();
        $sql="SELECT * from CARNET where ID=:id";
        $stmt=$connexion->prepare($sql);
        $stmt->bindParam(":id", $_GET["ID"]);
        $stmt->execute();
        if (!$stmt) echo "Pb d'accès au CARNET";
        else{
        if ($stmt->rowCount()==0) echo "Inconnu !<br/>";
        else
        foreach ($stmt as $row)
        echo $row["PRENOM"]." ".$row["NOM"].
        "né(e) le ".$row["NAISSANCE"]."<br/>";
        }
        }
    ?>
</body>
</html>