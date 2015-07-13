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
					if (isset($_SESSION['authentifie']) && isset($_SESSION['admin'])) //ajouter && $_SESSION['login']==admin1...
					{
						$_SESSION['login'];
			 			require '../securite/connexion.php';
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
						
						$result=$idcom->query("SELECT * FROM auteurs WHERE auteur LIKE '$up_auteur'");
		
						$quartier=$idcom->query("SELECT * FROM quartiers WHERE quartier LIKE '$up_quartier'");
						$epoque=$idcom->query("SELECT * FROM epoques WHERE epoque LIKE '$up_epoque'");
						$theme=$idcom->query("SELECT * FROM themes WHERE theme LIKE '$up_theme'");
						
						if ($result->num_rows==0) 
						{
							$ajout_auteur=$idcom->query("INSERT INTO auteurs(auteur) VALUES('$up_auteur')");
							echo "L'auteur : $up_auteur a été ajouté";
							echo "<br/>";
							$result2=$idcom->query("SELECT * FROM auteurs WHERE auteur LIKE '$up_auteur'");
							//récupération de l'id_quartier
							$id_quartier=$quartier->fetch_array (MYSQLI_ASSOC);					
							$idquartier=$id_quartier['id_quartier'];
							//récupération de l'id_epoque
							$id_epoque=$epoque->fetch_array (MYSQLI_ASSOC);
							$idepoque=$id_epoque['id_epoque'];
							//récupération de l'id_theme
							$id_theme=$theme->fetch_array (MYSQLI_ASSOC);
							$idtheme=$id_theme['id_theme'];
							//récupération de l'id_auteur
							$id_auteur=$result2->fetch_array (MYSQLI_ASSOC);
							$idauteur=$id_auteur['id_auteur'];
					
							$ajout_image=$idcom->query("INSERT INTO images(id_auteur, 
								date_prise_vue, couleur, id_theme,
								id_epoque, id_quartier, description, 
								latitude, longitude, fichier_image, type) 
								VALUES('$idauteur', '$up_date', '$up_couleur', 
								'$idtheme', '$idepoque', '$idquartier', 
								'$up_description', '$up_latitude',
								'$up_longitude', '$up_filename', '$up_type');");//il y a deux points virgules ici
							
							echo "Les métadonnées de la photographies ont bien été enregistrées";
						}

						elseif ($result->num_rows>=0) 
						{
							echo "l'auteur est déjà dans la base";
							echo "<br/>";
							//récupération de l'id_quartier
							$id_quartier=$quartier->fetch_array (MYSQLI_ASSOC);					
							$idquartier=$id_quartier['id_quartier'];
							echo $idquartier;
							//récupération de l'id_epoque
							$id_epoque=$epoque->fetch_array (MYSQLI_ASSOC);
							$idepoque=$id_epoque['id_epoque'];
							//récupération de l'id_theme
							$id_theme=$theme->fetch_array (MYSQLI_ASSOC);
							$idtheme=$id_theme['id_theme'];
							//récupération de l'id_auteur
							$id_auteur=$result->fetch_array (MYSQLI_ASSOC);
							$idauteur=$id_auteur['id_auteur'];
					
							$ajout_image=$idcom->query("INSERT INTO images(id_auteur, 
								date_prise_vue, couleur, id_theme, 
								id_epoque, id_quartier, description, 
								latitude, longitude, fichier_image, type) 
								VALUES('$idauteur', '$up_date', '$up_couleur', 
								'$idtheme', '$idepoque', '$idquartier', 
								'$up_description', '$up_latitude',
								'$up_longitude', '$up_filename', '$up_type');");

							echo "Les métadonnées de la photographies ont bien été enregistrées";
						}
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
