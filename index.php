<?php 
  require("config.php");
  include("functions.php");
?>

<?php include("includes/header.php") ?>

<?php
  //On utilise le paramêtre 'page' dans l'url pour afficher les pages about et contact
  //Pour la sécurité, il vaut mieux ne pas avoir le même nom de paramètre que le script php 
  if ( isset($_GET['page']) ) :
    switch($_GET['page']) :
      case 'about' :
        include("includes/about.php");
        break;
      case 'contact' :
        include("includes/contact.php");
        break;

        //Par défaut, si le contenu de $_GET est différent de 'about' et 'contact', on renverra l'utilisateur vers la homepage
      default :
        include("includes/home.php");
    endswitch;

  elseif ( isset($_GET['projet']) ) :
    include("includes/projet.php");

  else :
    include("includes/home.php");

  endif;
?>

<?php include("includes/footer.php") ?>