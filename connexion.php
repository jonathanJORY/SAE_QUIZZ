
<?php
function connect_bd() {
    $dsn = "sqlite:"."./database.db";
    try {
        $connexion = new PDO($dsn);
    } catch (PDOException $e) {
        printf("Échec de la connexion : %s\n", $e->getMessage());
        exit();
    }
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $connexion;
}
?>
