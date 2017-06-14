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
      default :
        include("includes/home.php");
    endswitch;

  else :
    include("includes/home.php");

  endif;
?>

<?php include("includes/footer.php") ?>

<?php 
  print_r($_GET)
?>