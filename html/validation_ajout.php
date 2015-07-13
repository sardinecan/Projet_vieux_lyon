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
			<h1>Enregistrement de votre photographie</h1>
			<article>
				<h2>Récapitulatif :</h2>
				<?php
					$content_dir = "../images/photographies/upload";
					$type_file = $_FILES['up_file']['type'];
					$up_filename=$_POST['up_filename'];
					$chemin = $content_dir.DIRECTORY_SEPARATOR.$up_filename . '.jpg';
					$toto = "upload";
					$newname = $toto.DIRECTORY_SEPARATOR.$up_filename . '.jpg';
					$_SESSION['login'];
	
					if (isset($_SESSION['authentifie'])) 
					{
						if (isset ($_POST['upload']))
						{
						//vérification type image
							if (!strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg'))
							{
								echo "<div class='rep'>";
								echo "Le type de fichier n'est pas autorisé.";
								echo "</div>";
							}
	
							if( !move_uploaded_file($_FILES['up_file']['tmp_name'], $chemin))
							{
								echo "<div class='rep'>";
								echo " L'image n'a pas été enregistrée !";
								echo "</div>";
							}
							else
							{
	
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
		
		
								$result=$idcom->query("INSERT INTO upload 
									(up_auteur, up_theme, up_epoque, 
									up_quartier, up_type, up_latitude, 
									up_longitude, up_description, up_date, 
									up_couleur, up_filename, up_file, up_id_membre) 
									VALUES ('$up_auteur', '$up_theme', '$up_epoque', 
										'$up_quartier', '$up_type', '$up_latitude', 
										'$up_longitude', '$up_description','$up_date', 
										'$up_couleur', '$newname', '$up_image', '$up_id_membre')");
								if(!$result)
								{
									die('Requête invalide: ' .mysql_error());
								}
								else 
								{
									echo "<div class='rep'>";
									echo $_SESSION['login'];
									echo " Votre image a bien été envoyée !";
									echo "<br/>";
									echo "<a href='abonnes.php'>Votre espace membre</a>";
									echo "</div>";
								}
							}
						}
					}
					else 
					{
						echo "<div class='rep'>";
						echo "Veuillez vous identifier pour accéder à cette page.";
						echo "</div>";
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
