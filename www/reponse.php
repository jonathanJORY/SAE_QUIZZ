<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <title>
            Quizz One Piece
        </title>
    </head>
    <body>
        <h1> Voici la réponses au Quizz One Piece avec quelques petites précisions : </h1> <br>

        <!-- Checkboxes -->
        <h2>Les freres de Luffy : </h2>
        <p> 
        <?php
        if(isset($_GET['Sabo'])){echo "Sabo :Vrai";}
        else echo "Vous avez oublié Sabo.";echo"<br>";
        if(isset($_GET['Ace'])){echo "Ace : Vrai";}
        else echo "Vous avez oublié Ace.";echo"<br>";
        if(isset($_GET['Garp'])){echo "Garp : Faux Garp est le grand-pere de Luffy";echo"<br>";}
        if(isset($_GET['Autre'])){echo "Autre : Faux Luffy n'a aucun autre freres";echo"<br>";}
        ?></p>

        <!-- Radio boutons -->
        <h2>Le frere de Luffy qui est mort à Marine Ford : </h2>
        <p> 
        <?php 
        if($_GET['mort']=="Ace") {echo "Ace : <b>Correct</b>";}
        else echo "<b>Faux</b>, C'est Ace qui est mort à Marine Ford."; 
        echo"<br>"; 
        ?> </p>


        <!-- Texte -->
        <h2>Votre personnage favoris est :</h2> 
        <p> 
        <?php echo $_GET['favoris'] ; ?> </p>

        <!-- Select -->
        <h2>Le Schichibukai qui est le rival de Shanks est:</h2> 
        <p> 
        Vous avez répondu 
        <?php
        if($_GET['Shichibukai']=="Crocodile") {echo "Crocodile. <b>Faux</b>, la bonne réponse est Dracule Mihawk.";}
        if($_GET['Shichibukai']=="Marshall D Teach") {echo "Marshall D Teach. <b>Faux</b>, la bonne réponse est Dracule Mihawk.";}
        if($_GET['Shichibukai']=="Boa Hancock") {echo "Boa Hancock <b>Faux</b>, la bonne réponse est Dracule Mihawk.";}
        if($_GET['Shichibukai']=="Baggy") {echo "Baggy. <b>Faux</b>, la bonne réponse est Dracule Mihawk.";}
        if($_GET['Shichibukai']=="Dracule Mihawk") {echo "Dracule Mihawk: <b> correct.</b>";}
        echo"<br>"; echo"<br>"; 
        ?></p>

</body>
</html>