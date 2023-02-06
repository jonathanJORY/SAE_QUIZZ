<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Questionnaire </title>
</head>

<div class="login-box">
  <h2>Creer un questionnaire</h2>
  <form id="formulaire" action="question.php"  method="post">
    <p>
      <label for="Titre">Titre du Questionnaire</label>
      <input type="text" id="Titre" name="Titre" required>
      <label for="Description">Description du Questionnaire</label>
      <input type="text" id="Description" name="Description" required>
    <p>
      <input type="summit" value="Créer">
    </p>
  </form>
</div>
</html>
