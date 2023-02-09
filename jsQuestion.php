<!doctype html>
<html>
<head>
<title>
creer question
</title>
<meta charset="utf-8">
</head>
<body>
<?php 
$nomQuestionnaire=$_POST['questionnaireName'];
$descQuestionnaire=$_POST['questionnaireDescription'];
require_once('connexion.php');
$connexion=connect_bd();
$sql = "INSERT INTO QUESTIONNAIRE (questionnaireName, questionnaireDescription) VALUES (?,?)";
$stmt = $connexion->prepare($sql);
$stmt->execute([$nomQuestionnaire, $descQuestionnaire]);
echo "<h3> Questionnaire: $nomQuestionnaire </h3>";
?>

<div class="login-box">
  <form id="formulaire" action="reponse.php"  method="post">
    <div id="question">

      <section id="Q1">
        <div id="hidden1">
          <p>
            <label for="Q1Titre">1ère question</label>
            <input type="text" id="Q1Titre" name="Q1Titre" required>
          </p>
          <p id="Q1Types">
            Type 1ère question:
            <br/>
            <label for="checkbox">checkbox</label>
            <input id="checkbox" type="radio" name="1" value="1" onclick="selectTypes(this)" required>
            <label for="radio">radio</label>
            <input id="radio" type="radio" name="1" value="2" onclick="selectTypes(this)" required>
            <label for="dropdown">dropdown</label>
            <input id="dropdown" type="radio" name="1" value="3" onclick="selectTypes(this)" required>
            <label for="text">text</label>
            <input id="text" type="radio" name="1" value="4" onclick="selectTypes(this)" required>
          </p>
          <input id="buValider1" type="button" name="1"value="valider question" onclick="validQuestion(this)">
        </div>
        <input id="bu1" type="button" name="1"value="suivant" disabled="true" onclick="addQuestion(this)">
      </section>
    </div>
    <p>
      <input type="button" value="Terminer">
    </p>
  </form>
</div>
</html>
<script>
  function choixTypeQ(numQ){
    let typesQ = ["checkbox", "radio", "dropdown", "text"];
    let paragraphe = document.createElement("p");
    paragraphe.id = "Q"+numQ+"Types";
    for(let i=0; i<typesQ.length; i++){
      let label = document.createElement("label");
      let input = document.createElement("input");
      input.type = "radio";
      input.name = numQ;
      input.id = typesQ[i];
      input.value = i+1
      input.required = true;
      input.onclick = function() {selectTypes(this)};
      label.textContent = typesQ[i];
      label.htmlFor = typesQ[i];
      paragraphe.append(label);
      paragraphe.append(input);
    }
    return paragraphe;
  }
  function nomQ(numQ){
    let paragraphe = document.createElement("p");
    let titre = document.createElement("label");
    let input = document.createElement("input");
    input.type = "text";
    input.required = true;
    input.name = "Q°"+numQ+"Titre";
    input.id = "Q°"+numQ+"Titre";
    let label = document.createElement("label");
    label.textContent = numQ+"ème Question";
    label.htmlFor = "Q°"+numQ+"Titre";
    paragraphe.append(label);
    paragraphe.append(input);
    return paragraphe;

  }
  function addQuestion(bu){
    var newNumQ = parseInt(bu.name)+1;
    if (newNumQ > 2){
      document.getElementById("bu"+(newNumQ-2)).disabled = true;
    }
    let quiz = document.getElementById("question");
    let section = document.createElement("section");
    section.id = "Q"+newNumQ;
    
    section.append(nomQ(newNumQ));
    section.append(choixTypeQ(newNumQ));

    let newBu = document.createElement("input");
    newBu.type = "button";
    newBu.id = "bu"+newNumQ;
    newBu.name= ""+newNumQ;
    newBu.value = "ajouter question";
    newBu.onclick = function() {addQuestion(this)};
    section.append(newBu);

    quiz.append(section);
    bu.value = "supprimer question";
    bu.onclick = function() {deleteQuestion(this)};
  }

  function deleteQuestion(bu){
    var newNumQ = parseInt(bu.name)+1;
    let section = document.getElementById("Q"+newNumQ);
    section.remove();
    bu.value = "ajouter question";
    bu.onclick = function() {addQuestion(this)};
  }

  function validQuestion(bu){
    var numQ = parseInt(bu.name);
    document.getElementById("hidden"+numQ).hidden = true;
    document.getElementById("bu"+numQ).disabled = false;
  }

  function selectTypes(idchoix){
    if (idchoix.value == "1"){

    }
    else if (idchoix.value == "2"){

    }
    else if (idchoix.value == "3"){
    }
    else{

    }
  }

</script>
<?php

require("question.php");


?>

</body>
</html>