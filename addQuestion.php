<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Questionnaire </title>
</head>

<div class="login-box">
  <h2>Creer un questionnaire</h2>
  <form id="formulaire" action="reponse.php"  method="post">
    <p>
      <label for="Titre">Titre du Questionnaire</label>
      <input type="text" id="Titre" name="Titre" required>
    </p>
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
    var numQ = parseInt(bu.name)+1;
    if (numQ > 2){
      document.getElementById("bu"+(numQ-2)).disabled = true;
    }
    let quiz = document.getElementById("question");
    let section = document.createElement("section");
    section.id = "Q"+numQ;
    
    section.append(nomQ(numQ));
    section.append(choixTypeQ(numQ));

    let newBu = document.createElement("input");
    newBu.type = "button";
    newBu.id = "bu"+numQ;
    newBu.name= ""+numQ;
    newBu.value = "ajouter question";
    newBu.onclick = function() {addQuestion(this)};
    section.append(newBu);

    quiz.append(section);
    bu.value = "supprimer question";
    bu.onclick = function() {deleteQuestion(this)};
  }

  function deleteQuestion(bu){
    var numQ = parseInt(bu.name)+1;
    let section = document.getElementById("Q"+numQ);
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
