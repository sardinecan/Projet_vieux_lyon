<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr" >
	<head>
		<meta name="keywords" content="les amis du vieux lyon, vieux lyon, saint jean, saint paul, saint georges">
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../theme/style.css">
		<title>Les Amis du Vieux Lyon - Présentation</title>
	</head>
	<body>
	<div id="page">
		<header>
			<img alt="accueil" class="photo_accueil" src="../images/bandeau.jpg">
			<nav><!--insérer des commentaires dans la liste pour supprimer le problème de whitespace-->
				<ul id="menu"><!--whitespace
				--><li><a href="../index.html">Accueil</a></li><!--whitespace
				--><li><a href="presentation.html">Présentation</a></li><!--whitespace
	 			--><li><a href="galerie.html">Galerie</a></li><!--
	 			--><li><a href="abonnes.php">Espace abonnés</a></li>
				</ul>
			</nav>
		</header>
		<section id="galerie">
			<h1>Modification</h1>
				<?php
	 			require '../securite/connexion.php';
				if (isset($_SESSION['authentifie'])) 
 				{	
 					$id_membre=$_SESSION['login'];
					$results=$idcom->query("SELECT * FROM upload
											WHERE id_upload LIKE '$_POST[id_upload]'");
					$row=$results->fetch_array (MYSQLI_ASSOC);
					echo"<aside>
					<form id='ajout' method='post' action='validation_modification.php' enctype='multipart/form-data'>
					<ul>						
						<li><input type='hidden' name='up_id_membre' value='";
						echo $_SESSION['login'];
						echo "'/>";
						echo "</li>
						<li><input type='hidden' name='id_upload' value='";
						echo $_POST['id_upload'];
						echo "'/>";
						echo "</li>
						
						<li><label>Nom de l'auteur:</label><br/></li>
						<li><input type='text' maxlength='50' name='up_auteur' /></li>
						
						<li><label>Sélectionnez un type de bâtiment :</label></li>
						<li><select name='up_theme'>
							<option label='Thèmes'></option>
		  					<option>rues</option>
		  					<option>traboules</option>
		  					<option>monuments</option>
		  					<option>facades</option>
		  					<option>divers</option>
						</select>
						</li>
						
						<li><label>Sélectionnez une époque :</label></li>
						<li><select name='up_epoque'>
							<option label='Epoques'></option>
							<option>Moyen-age</option>
							<option>Renaissance</option>
							<option>XIXe</option>
							<option>autre</option>
						</select></li>
						
						<li><label>Sélectionnez un quartier :</label></li>
		  				<li><select name='up_quartier'>
		  					<option label='Quartiers'></option>
		  					<option>Saint Jean</option>
		  					<option>Saint Georges</option>
		  					<option>Saint Paul</option>
		  				</select></li>
		  				
						<li><label>Date de la prise de vue:</label></li>";
						echo "<li><input type='date' name='up_date' value='";
						echo date("Y-m-d");
						echo "'/></li>
						
						<li><label>Nature de la photographie</label></li>
						<li><select name='up_type'>
							<option label='Type'></option>
							<option>Argentique</option>
							<option>Numérique</option>
						</select></li>

						<li><label>Photographies en couleur:</label></li>
						<li><select name='up_couleur'>
							<option label='Couleur'></option>
							<option>Oui</option>
							<option>Non</option>
						</select></li>
					</ul>
					<ul>
						
						<li><label>Données de géolocalisation</label></li>
						<li><label>Latitude</label></li>
						<li><input name='up_latitude' type='text' maxlength='10' /></li>
						<li><label>Longitude</label></li>
						<li><input name='up_longitude' type='text' maxlength='10'/></li>
						
						<li><label>Description de l'image</label></li>
						<li><textarea name='up_description' rows='6' cols='20' maxlength='600'></textarea></li>
						
						<li><label>Insérer l'image (JPG | max. 1 Mo) :</label></li>
						<li><label>Nom du fichier</label></li>
						<li><input type='text' name='up_filename'/></li>
						<li><input type='hidden' name='MAX_FILE_SIZE' value='1000000'/></li>
						<li><input class='file' name='up_file' type='file'/></li>
						
						<li><input type='submit' name= 'update' value='Envoyer'/> </li>
					</ul>
				</form>
				</aside>";

						echo "<article>";
						echo "<h2>Image téléchargée :</h2>";
						echo "<ul>";
						echo "<li><img class='grande' alt='image' src=../images/photographies/";
						echo $row['up_filename'];
						echo"></li>";
						echo "<li>";				
							echo "Photographie prise par ";
							echo $row['up_auteur'];
							echo " le ";
							echo $row['up_date'];
						echo "</li>";
						echo "<li>";				
							echo "Lieu :  Quartier ";
							echo $row['up_quartier'];
							echo " : ";
							echo $row['up_description'];
							echo " (époque : ";
								echo $row['up_epoque'];
							echo ").";
						echo "</li>";
						echo "<li>";				
							echo "Type : ";
							echo $row['up_type'];
						echo "</li>";
						echo "<li>";				
							echo "Couleur : ";
							echo $row['up_couleur'];
						echo "</li>";
						echo "</ul>";
						echo "</article>";
							
				}
				else
				{
					echo "<div id='reponse'";
					echo "Vous n'êtes pas connecté";
					echo "</div>";
				}
				$idcom->close();
				?>
				<br />
		</section>
		<footer>
			<p><a href="footer.html#contacts"> Contacts & crédits </a> &#169; <a href="footer.html#copyright"> Mentions légales & copyright </a> Amis du Vieux Lyon</p>
		</footer>
		</div>
	</body>
</html>