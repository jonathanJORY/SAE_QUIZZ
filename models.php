<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Quizz</title>
</head>
<body>
<?php

class Questionnaire {
    public $id;
    public $titre;
    public $description;
    
    public function __construct($id, $titre, $description) {
        $this->id = $id;
        $this->titre = $titre;
        $this->description = $description;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getTitre() {
        return $this->titre;
    }
    
    public function setTitre($titre) {
        $this->titre = $titre;
    }
    
    public function getDescription() {
        return $this->description;
    }
    
    public function setDescription($description) {
        $this->description = $description;
    }
}

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
    
    public function getType() {
        return $this->type;
    }
    
    public function setType($type) {
        $this->type = $type;
    }
    
    public function getText() {
        return $this->text;
    }
    
    public function setText($text) {
        $this->text = $text;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
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
    public function getRepPossibles() {
        return $this->repPossibles;
    }
    
    public function setRepPossibles($repPossibles) {
        $this->repPossibles = $repPossibles;
    }
    
    public function getBonneRep() {
        return $this->bonneRep;
    }
}

class Contenir {
    public $questionnaireID;
    public $questionID;
    public $questionOrder;
    
    public function __construct($questionnaireID, $questionID, $questionOrder) {
        $this->questionnaireID = $questionnaireID;
        $this->questionID = $questionID;
        $this->questionOrder = $questionOrder;
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
