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
		<h1>Ajout d'une photographie dans la banque d'images</h1>
		<article id="article_simple">
		<?php
		if (isset($_SESSION['authentifie'])) 
		{
			echo " 
			<div id='abonnes'>
				<h2>Remplissez ce formulaire: </h2>
				<form id='ajout' method='post' action='validation_ajout.php' enctype='multipart/form-data'>
					<ul>						
						<li><input type='hidden' name='up_id_membre' value='";
						echo $_SESSION['login'];
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
						<li><textarea name='up_description' rows='6' cols='30' maxlength='600'></textarea></li>
						
						<li><label>Insérer l'image (JPG | max. 1 Mo) :</label></li>
						<li><label>Nom du fichier</label></li>
						<li><input type='text' name='up_filename'/></li>
						<li><input type='hidden' name='MAX_FILE_SIZE' value='1000000'/></li>
						<li><input class='file' name='up_file' type='file'/></li>
						<li>/!\ En ajoutant cette image, vous confirmez posséder</li>
						<li>tous les droits qui y sont attachés.</li>
						
						<li><input type='submit' name= 'upload' value='Envoyer'/> </li>
					</ul>
				</form>
			</div>";
		}
		else 
		{
			echo "Veuillez vous connecter pour accéder à cette page.";
		}
		?>
		</article>
		</section>
		<footer>
			<p><a href="footer.html#contacts"> Contacts & crédits </a> &#169; <a href="footer.html#copyright"> Mentions légales & copyright </a> Amis du Vieux Lyon</p>
		</footer>
		</div>
	</body>
</html>