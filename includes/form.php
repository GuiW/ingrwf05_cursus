<?php
  //On met TOUJOURS les requêtes INSERT avant les SELECT
  if ( isset($_POST['insert_module']) ) : 
  //Il faut absolument faire un require config.php car, à la soumission du formulaire, on va sur la page form.php sans passer par home.php
  require("../config.php");
  //"sprintf" recoit 9 arguments : la requête + les 8 variables venant du post
  //On utilise "sprintf" pour retourner une chaîne formatée
  //Le 1er %s correspond à la premiere variable, le 2eme %s correspond au deuxième, etc.
  $sql = sprintf("INSERT INTO modules SET titre = '%s', contenu = '%s', role = '%s', responsable = '%s', centre = '%s', annee = '%s', image1 = '%s', alt_image1 = '%s'",
  //La fonction addslashes ajoute des slash s'il y a des ' dans le texte
  addslashes($_POST['titre']),
  addslashes($_POST['contenu']),
  addslashes($_POST['role']),
  addslashes($_POST['responsable']),
  addslashes($_POST['centre']),
  $_POST['annee'],
  $_POST['image1'],
  addslashes($_POST['alt_image1'])
  );
  $connect -> query($sql);
  echo $connect -> error;
  //la redirection nettoie le post et nous permet de repartir avec une requête propre
  header("location:../index.html");
  exit;
endif;
?>

<a href="" id="add_module_btn">Ajouter un module (+)</a>
<form action="includes/form.php" method="post" id="add_module_form">
  <hr>

  <label for="title">Titre</label>
  <input type="text" name="titre" id="title">

  <label for="content">Description</label>
  <textarea name="contenu" id="content" cols="30" rows="10"></textarea>

  <label for="role">Rôle</label>
  <input type="text" name="role" id="role">

  <label for="responsable">Responsable</label>
  <input type="text" name="responsable" id="responsable">

  <label for="centre">Centre</label>
  <input type="text" name="centre" id="centre">

  <label for="year">Année</label>
  <input type="number" name="annee" id="year">

  <label for="img1">Image 1</label>
  <input type="file" name="image1" id="img1">
  <label for="alt_img1">Texte alternatif 1</label>
  <input type="text" name="alt_image1" id="alt_img1">

  <input type="hidden" name="insert_module">

  <fieldset>
    <button>Ajouter un module</button>
    <a href=""></a>
  </fieldset>
  

</form>