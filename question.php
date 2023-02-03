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
        require_once("models.php");
        require_once("connexion.php");
        $connexion=connect_bd();
        $sql="SELECT * from QUESTION where questionID=:id";
        echo"ici";
        $stmt=$connexion->prepare($sql);
        echo"ici";
        $stmt->bindParam(":id", intval($_GET["ID"]), PDO::PARAM_INT);
        echo"ici";
        $stmt->execute();
        echo"ici";
        if (!$stmt) echo "Pb d'accès au CARNET";
        else{
            if ($stmt->rowCount()==0){
                echo "Inconnu !<br/>";
            }
            else{
                echo"ici";
                foreach ($stmt as $row)
                echo $row["questionText"]." ".$row["questionType"]."<br/>";
            }
            
        }
        }
    ?>
</body>
</html>