<?php
  //Il faut absolument faire un require config.php car, à la soumission du formulaire, on ira sur la page form.php sans passer par home.php et donc index.php
  //Avec require_once, on vérifie si config.php a déjà été inclu précédemment. Si c'est le cas, on ne l'inclus pas.
  require_once("config.php");

  //On met TOUJOURS les requêtes INSERT avant les SELECT
  //IMPORTANT : systématiquement, quand on fait des requête qui vont modifier la DB, il faut absolument tester si la session utilisateur existe et donc si on est connecté.
  if ( isset($_POST['insert_module']) AND isset($_SESSION['role']) AND $_SESSION['role'] == 'admin') : 

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

<?php if( isset($_SESSION['role']) AND $_SESSION['role'] == 'admin' ) : ?>
<a href="" class="toggle_btn" id="add_module_btn">Ajouter un module (+)</a>
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

  <label for="img2">Image 2</label>
  <input type="file" name="image2" id="img2">
  <label for="alt_img2">Texte alternatif 2</label>
  <input type="text" name="alt_image2" id="alt_img2">

  <label for="img3">Image 3</label>
  <input type="file" name="image3" id="img3">
  <label for="alt_img3">Texte alternatif 3</label>
  <input type="text" name="alt_image3" id="alt_img3">

  <input type="hidden" name="insert_module">

  <fieldset id="btn_field">
    <button>Ajouter le module</button>
    <a href="" class="toggle_btn" id="close_module_btn">Fermer (X)</a>
  </fieldset>
</form>
<?php endif; ?>