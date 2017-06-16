<!doctype html>
<html class="no-js" lang="fr">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>PHP pour INGRWF05</title>
<meta name="description" content="INGRWF05 découvre PHP">

<!-- ******************************************************************************************
Set the type and color theme here -->
<link href="css/hawthorne_type1_color6.css" rel="stylesheet">
<!--  ************************************************************************************* -->

<link href="css/font-awesome.min.css" rel="stylesheet">
<script src="js/vendor/modernizr.js"></script>
<link href="css/myCss.css" rel="stylesheet">

</head>
<body>

<div class="top-border"></div>

<div class="row">
	<div class="small-12 medium-12 large-12 small-centered columns">
		<header>		
			<h1><a href="index.html">Ingrwf05</a></h1>
			<h2><a href="index.html">Design & Programmation</a></h2>
			
			<div class="logo">
				<a href="index.html"><img src="img/logo.png" alt="Your Name Here" /></a>
			</div>
			
		</header>
	</div>
	<div class="small-12 medium-12 large-12 small-centered columns">
		<nav>
			<ul class="inline-list-custom">
        <!-- On utilise la réécriture d'url pour pouvoir utiliser "about.html" et contact.html -->
        <!-- Voir le fichier .htaccess ligne 3 -->
				<li><a href="index.html" <?php myCurrent("index"); ?>>En vedette</a></li>
				<li><a href="about.html" <?php myCurrent("about"); ?>>A propos</a></li>
				<li><a href="contact.html" <?php myCurrent("contact"); ?>>Contact</a></li>
        <?php if ( isset($_SESSION['id_user'])) : 
          //Pour se déconner, on va renvoyer vers la page admin.php avec $_GET qui contient delog
        ?>
        <li><a href="includes/admin.php?delog">Se déconnecter</a></li>
        <?php endif; ?>
			</ul>
		</nav>
	</div>
</div>		