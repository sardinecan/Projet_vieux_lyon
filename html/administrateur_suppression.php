<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr" >
	<head>
		<meta name="keywords" content="les amis du vieux lyon, vieux lyon, saint jean, saint paul, saint georges">
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../theme/style.css">
		<title>Les Amis du Vieux Lyon - Accueil</title>
	</head>
	<body>
	<div id="page">
		<header>
			<img class="photo_accueil" src="../images/bandeau.jpg" alt="accueil">
			<nav><!--insérer des commentaires dans la liste pour supprimer le problème de whitespace-->
				<ul id="menu"><!--whitespace
				--><li><a href="../index.html">Accueil</a></li><!--whitespace
				--><li><a href="presentation.html">Présentation</a></li><!--whitespace
	 			--><li><a href="galerie.html">Galerie</a></li><!--
	 			--><li><a href="abonnes.php">Espace abonnés</a></li>
				</ul>
			</nav>
		</header>
		<section>
			<h1>Validation de la photographie </h1>
			<article>
				<h2>Récapitulatif :</h2>
				<?php
					if (isset($_SESSION['authentifie']) && isset($_SESSION['admin']))
					{
						$_SESSION['login'];
 						require '../securite/connexion.php';
						$id_upload=$_POST['id_upload'];
						$up_auteur=$_POST['up_auteur'];
						$up_theme=$_POST['up_theme']; 
						$up_epoque=$_POST['up_epoque'];
						$up_quartier=$_POST['up_quartier'];
						$up_type=$_POST['up_type'];
						$up_latitude=$_POST['up_latitude'];
						$up_longitude=$_POST['up_longitude'];
						$up_description=$_POST['up_description'];
						$up_date=$_POST['up_date'];
						$up_couleur=$_POST['up_couleur'];
						$up_id_membre=$_POST['up_id_membre'];
						$up_filename=$_POST['up_filename'];

					
						$suppression_image=$idcom->query("DELETE FROM upload WHERE id_upload LIKE '$id_upload'");
						echo "La photographie a bien été supprimée.";
					}

					else 
					{
						echo "Vous n'êtes pas habilité veuillez vous identifier";
					}
					$idcom->close();
				?>
			</article>
		</section>
	
	<footer>
		<p><a href="footer.html#contacts"> Contacts & crédits </a> &#169; <a href="footer.html#copyright"> Mentions légales & copyright </a> Amis du Vieux Lyon</p>
	</footer>
	</div>
	</body> 
</html>
