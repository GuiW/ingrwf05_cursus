<?php

  // MODE DEBUG

  //On définit une constante. Par convention, on la met en majuscule.
  //On peut activer et désactiver le mode debug à souhait en passant la constante DEBUG en true ou false.
  define("DEBUG", true);

  //Par défaut, on affiche toutes les erreurs sauf les notices
  error_reporting(E_ALL & ~E_NOTICE);

  //Si on passe en mode debug, on affiche tout, notices y compris
  if (DEBUG == true) :
    error_reporting(E_ALL);
  endif;

  function debug() {
    if (DEBUG == true) :
      echo '<div id="debug">';
      echo "<pre>";

        echo '<strong>$_POST :</strong><br>';
        print_r($_POST);

        echo '<strong>$_GET :</strong><br>';
        print_r($_GET);

        echo '<strong>$_SESSION :</strong><br>';
        print_r($_SESSION);

      echo "</pre>";
      echo '</div>';
    
    endif;
  }

// ************************************************************************** //

  //GESTION DE CLASSE CURRENT DANS LA NAVIGATION

  function myCurrent($page) {
    //On vérifier si on a bien le paramètre "page" dans l'url
    if ( isset($_GET['page']) ) :
      //Si c'est le cas, on renvoit la condition qui permet de donner la class current si le contenu de la variable $page correspon à la valeur du paramètre page de url
      echo ($_GET['page']==$page) ? 'class="current"' : '';
    endif;
  }

// Quand on inclut un script php dans un autre, on conseille de ne pas fermer la balise php dans le fichier importé