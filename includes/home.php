<?php
  //On définit la requête sql dans une variable
  $sql = "SELECT * FROM modules";

  //On exécute la requête mais on la perd. Il faut donc récupérer le résultat dans une variable ($q_personnes)
  $q_modules = $connect->query($sql);

  //En cas d'erreur, on l'affiche
  echo $connect->error;

  //On récupère le nombre de lignes
  $nb_modules = $q_modules->num_rows;
?>

<div class="row">
	<div class="small-12 medium-12 large-12 columns">
		<ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-3 inline-list-custom">

			<!-- Begin project -->
      <?php if ( isset($nb_modules) AND $nb_modules > 0 ) : 

        while ( $row = $q_modules -> fetch_object() ) : ?>
          <li>
            <figure class="thumbnail">
              <div class="thumbnail-img">
                <div class="thumbnail-hover"><a href="project-<?php echo $row->id_module?>.html"></a></div>
                <a href="project-<?php echo $row->id_module?>.html"><img src="img/projects/<?php echo $row->id_module?>-1.jpg" alt="Project 01" /></a>
              </div>
              <figcaption class="thumbnail-caption"><a class="caption-link" href="project-<?php echo $row->id_module?>.html"><?php echo $row->titre?></a></figcaption>
            </figure>
          </li>
      <?php endwhile;
        
      endif; ?>
			<!-- End project -->

		</ul>
	</div>
</div>