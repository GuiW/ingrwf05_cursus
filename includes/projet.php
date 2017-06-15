<?php

//On veut afficher les lignes dont la propriété id_personnes = la valeur du paramètre id_personnes de l'url
  $sql = "SELECT * FROM modules WHERE id_module =".$_GET['projet'];
//$the_personne contient la ligne de la table 
  $the_module = $connect->query($sql);
  echo $connect->error;
  $the_nb_module = $the_module->num_rows;

?>

<div class="row">
  <?php if ( isset($the_nb_module) AND $the_nb_module > 0 ) : 

    while ( $row = $the_module -> fetch_object() ) : ?>
    <div class="small-12 medium-7 large-7 columns">
      <h2><?php echo $row->titre ?></h2>
      <?php echo $row->contenu ?>
    </div>
    <div class="small-12 medium-5 large-5 columns">
      <div class="lined-list">
        <ul>
          <li><strong>Rôle:</strong> <?php echo $row->role ?></li>
          <li><strong>Responsable:</strong> <?php echo $row->responsable ?></li>
          <li><strong>Centre:</strong> <?php echo $row->centre ?></li>
          <li><strong>Année:</strong> <?php echo $row->annee ?></li>
        </ul>
      </div>
    </div>
</div>

<div class="row">
	<div class="small-12 medium-12 large-12 columns">
		<hr class="project-detail-hr" />
		
		<!-- Begin project image -->
		<div class="project-img">
			<img src="img/projects/<?php echo $row->image1?>" alt="<?php echo $row->alt_image1?>" />
			<h6><?php echo $row->alt_image1?></h6>
		</div>
		<!-- End project image -->
		<?php if ( $row->image2 != NULL) : ?>
		<!-- Begin project image -->
		<div class="project-img">
			<img src="img/projects/<?php echo $row->image2?>" alt="<?php echo $row->alt_image2?>" />
			<h6><?php echo $row->alt_image2?></h6>
		</div>
		<!-- End project image -->
    <?php endif; ?>
		<?php if ( $row->image3 != NULL) : ?>
		<!-- Begin project image -->
		<div class="project-img">
			<img src="img/projects/<?php echo $row->image3?>" alt="<?php echo $row->alt_image3?>" />
			<h6><?php echo $row->alt_image3?></h6>
		</div>
		<!-- End project image -->
    <?php endif; ?>
    
		
	</div>
  <?php endwhile;

  else : ?>
    <h2>Il n'y a rien à afficher, désolé :(</h2>

  <?php endif; ?>
</div>