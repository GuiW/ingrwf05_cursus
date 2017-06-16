<?php
  //Si on a le paramètre delog dans l'url, on veut retirer l'utilisateur de la session
  //On ne peut lire et écrire dans la session sans session_start. On en a donc besoin ici vu que pour le delog, on est dirigé vers la page admin.php directement sans passer par l'index.
  if( isset($_GET['delog']) ) :
    session_start();
    unset($_SESSION['id_user']);
    unset($_SESSION['role']);
    header("location:../admin.html");
    exit;
  endif;

//Requête qui va chercher un utilisateur dans la DB
  if ( isset($_POST['connexion'])) :
    $sql = sprintf("SELECT * FROM users WHERE login = '%s' AND password = '%s'",
    $_POST['login'],
    md5($_POST['password']));

    //Connexion et execution de la requête
    require("../config.php");
    //On récupère le résultat de la requêtre dans $test_log
    $test_log = $connect -> query($sql);
    echo $connect -> error;
    $nb_user = $test_log -> num_rows;

    if ($nb_user > 0) :
      //On récupère l'utilisateur en tant qu'objet'
      $row = $test_log -> fetch_object();

      //On va plutôt vouloir activer notre session en permanence. On va donc mettre le session_start dans le config.php
      //session_start();

      //Dans la session, on crèe une entrée "id_user" et on met à l'intérieur l'id de l'utilisateur qui vient de se connecter
      $_SESSION['id_user'] = $row -> id_users;
      $_SESSION['role'] = $row -> role;
      //On redirige l'utilisateur vers la page index
      header("location:../index.html");
      
      else :
        //En cas d'erreur dans le mot de passe ou login
        //On redirige vers index.php avec le paramètre erreur=log qu'on crèe ici et le paramètre page=admin qui permet d'afficher le formulaire
        header("location:../index.php?erreur=log&page=admin");
      exit;
    endif;
  endif;
?>
<?php 
//On a inclu admin.php dans le footer et le form n'est créé que si la variable $_GET contient page = admin
if ( isset($_GET['page']) AND $_GET['page'] == 'admin') : ?>

<div id="admin_mask"></div>
<div id="admin_form">

  <form action="includes/admin.php" method="post">

    <?php 
    //En cas d'erreur dans le login/mdp
    if( isset($_GET['erreur']) AND $_GET['erreur'] == 'log') :?>
      <p class="erreur">Erreur de login/mot de passe</p>
    <?php endif;?>

    <h2>Connectez-vous : </h2>

    <label for="login">Login</label>
    <input type="text" name="login" id="login">

    <label for="pass">Password</label>
    <input type="text" name="password" id="pass">

    <input type="submit" name="connexion" value="Se connecter">

    <a href="index.html" id="admin_close_btn">X</a>
  </form>
</div>

<?php endif;?>
