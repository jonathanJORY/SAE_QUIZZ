<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Quizz</title>
</head>
<body>
<?php

class SimpleQuestion {
    public $type;
    public $text;
    public $id;
    
    public function __construct($id, $type, $text, $name) {
        $this->type = $type;
        $this->text = $text;
        $this->id = $id;
        $this->name = $name;
    }
}
    
class Question extends SimpleQuestion {
    public $repPossibles;
    public $bonneRep;
    
    public function __construct($id, $type, $text, $name, $repPossibles, $bonneRep) {
        parent::__construct($id, $type, $text,  $name);
        $this->repPossibles = $repPossibles;
        $this->bonneRep = $bonneRep;
    }
}
    
/*
$questions = array(
    new Question(
            1,
        "checkbox",
        "Qui sont les freres de Luffy ?",
        "frere",
        array("Ace", "Garp", "Shanks", "Sabo"),
        array("Ace", "Sabo")
    ),
    new Question(
        2,
        "radio",
        "Qui est mort à Marine Ford ?",
        "mort",
        array("Ace", "Garp", "Shanks", "Sabo"),
        "Ace"
    ),
    new SimpleQuestion(
        3,
        "text",
        "Qui est votre perso favori ?",
        "fav",
    )
);


function type_checkbox($question) {
    echo("<p>");
    echo("<h4>" . $question->text . "</h4>");
    foreach ($question->repPossibles as $possible) {
        echo($possible . "<input type=checkbox name='$possible'>");
    }
    echo("</p>");
}

function type_radio($question) {
    echo("<p>");
    echo("<h4>" . $question->text . "</h4>");
    foreach ($question->repPossibles as $possible) {
        echo($possible . "<input type=radio name='$question->name' value='$possible'>");
    }
    echo("</p>");
}

function type_text($question) {
    echo("<p>");
    echo("<h4>" . $question->text . "</h4>");
    echo($possible . "<input type=text name='$$question->name'>");
    echo("</p>");
}


function creer_question($questions) {
    echo("<h2>Bienvenue dans ce Quizz sur One Piece</h2>");
    foreach ($questions as $question) {
        if ($question->type == "radio"){
            type_radio($question);}
        else if ($question->type == "checkbox"){
            type_checkbox($question);}
    }
}

creer_question($questions);
*/
?>
</body>
</html>
