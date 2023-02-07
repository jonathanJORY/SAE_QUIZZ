<!doctype html>
<html>
<head>
    <title>
    Crée/modifier une question par ID
    </title>
    <meta charset="utf-8">
</head>
<body>
    
    <?php $wanted=$_GET["questionID"];
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
        if (!empty($wanted)){
            echo "<h1>Recherche de $wanted </h1>";
        require_once("models.php");
        require_once("connexion.php");
        $connexion=connect_bd();
        $sql="SELECT * from QUESTION where questionID=:id";
        echo"ici";
        $stmt=$connexion->prepare($sql);
        echo"ici";
        $stmt->bindParam(":id", $wanted);
        echo"ici";
        $stmt->execute();
        $error = $stmt->errorInfo();
        echo"ici";
        if (!$stmt) echo "Pb d'accès au CARNET";
        else{
            echo"ici";
            foreach ($stmt as $row)
            echo $row["questionText"]." ".$row["questionType"]."<br/>";
            }
            
        }
    ?>
</body>
</html>