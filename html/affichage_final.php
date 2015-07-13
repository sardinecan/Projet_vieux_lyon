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
		<script type="text/javascript"
      		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0AGOm4mLq-SSnDQS5h0WD1WfdgVVll4Y">
    	</script>
    		<?php
 				require '../securite/connexion.php';
				$results=$idcom->query("SELECT * FROM images
											INNER JOIN quartiers ON images.id_quartier = quartiers.id_quartier
											INNER JOIN epoques ON images.id_epoque = epoques.id_epoque
											INNER JOIN themes ON images.id_theme = themes.id_theme
											INNER JOIN auteurs ON images.id_auteur = auteurs.id_auteur
											WHERE id_image LIKE '$_POST[id_image]'");
				$row=$results->fetch_array (MYSQLI_ASSOC);
			?>
    	<script type="text/javascript">
    		var Lat = '<?php echo $row['latitude']; ?>' ;
    		var Lng = '<?php echo $row['longitude']; ?>' ;
			function initialize() 
			{
  				var myLatlng = new google.maps.LatLng(Lat,Lng);
  				var mapOptions = 
  				{
    			zoom: 15,
    			center: myLatlng
  				}
  				var map = new google.maps.Map(document.getElementById('map-canvas2'), mapOptions);
  				var marker = new google.maps.Marker
  				({
      				position: myLatlng,
      				map: map,
      				title: '<?php echo $row['description']; ?>'
  				});
			}

			google.maps.event.addDomListener(window, 'load', initialize);
    	</script>
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
		<section>
			<h1>Fiche détaillée</h1>
			<aside>
				<h2>Effectuez une recherche</h2>
				<form method="post" action="interrogation_bdd.php">
	   				<p>
	       				<label>Sélectionnez un type de bâtiment :</label><br/>
	       				<select name="theme">
	       					<option label="toutes les thèmes"></option>
	          					<option>rues</option>
	          					<option>traboules</option>
	          					<option>monuments</option>
	          					<option>facades</option>
	          					<option>divers</option>
	       				</select>
	   				</p>
	   				<p>
	   					<label>Sélectionnez une époque :</label><br/>
						<select name="epoque">
							<option label="toutes les époques"></option>
							<option>Moyen-age</option>
							<option>Renaissance</option>
							<option>XIXe</option>
							<option>autre</option>
						</select>
					</p>
					<p>
	   					<label>Sélectionnez un quartier :</label><br />
	          			<input type="radio" name="quartier" value="Saint Jean" /> <label>Saint Jean</label><br />
	   	   				<input type="radio" name="quartier" value="Saint Paul"  /> <label>Saint Paul</label><br />
	 	   				<input type="radio" name="quartier" value="Saint Georges" /> <label>Saint Georges</label><br />
	 	   				<input type="radio" name="quartier" value="" checked/> <label>Pas de restriction</label><br />
	   				</p>
	   				<p>
	   					<label>Sélectionnez un type:</label><br/>
	   					<select name="type">
	   					<option label="Tous les types"></option>
	   						<option>Argentique</option>
	   						<option>Numérique</option>
	   					</select>
	   				</p>
	   				<input value="Rechercher" type="submit"/> 
				</form>
			</aside>
			<article>
				<?php
 					require '../securite/connexion.php';
		
					$results=$idcom->query("SELECT * FROM images
											INNER JOIN quartiers ON images.id_quartier = quartiers.id_quartier
											INNER JOIN epoques ON images.id_epoque = epoques.id_epoque
											INNER JOIN themes ON images.id_theme = themes.id_theme
											INNER JOIN auteurs ON images.id_auteur = auteurs.id_auteur
											WHERE id_image LIKE '$_POST[id_image]'");
					if (isset($_SESSION['authentifie']) && isset($_SESSION['admin'])) 
					{
					$row=$results->fetch_array (MYSQLI_ASSOC); 
						echo "<h2>";
						echo $row['description'];
						echo "</h2>";
						echo "<br/>";
						echo "<img class='grande' alt='image' src=../images/photographies/";
										echo $row['fichier_image'];
										echo">";
						echo "<br/>";
						echo "<ul>";
							echo "<li>";				
								echo "Photographie prise par ";
								echo $row['auteur'];
								echo " le ";
								echo $row['date_prise_vue'];
							echo "</li>";
							echo "<li>";				
								echo "Lieu :  Quartier ";
								echo $row['quartier'];
								echo " : ";
								echo $row['description'];
								echo " (époque : ";
									echo $row['epoque'];
								echo ").";
							echo "</li>";
							echo "<li>";				
								echo "Type : ";
								echo $row['type'];
							echo "</li>";
							echo "<li>";				
								echo "Couleur : ";
								echo $row['couleur'];
							echo "</li>";
							echo "</ul>";
	
							echo "<form action='modification_image.php' method='post' class='verif_img_admin'>";
							echo "<input type='hidden' name='id_image' value='";
							echo $row['id_image'];
							echo "'>";
							echo "<input type='submit' value='modifier'>";
							echo "</form>";	
							echo "<br/>";
							echo "<form action='suppression_image.php' method='post' class='verif_img_admin'>";
							echo "<input type='hidden' name='id_image' value='";
							echo $row['id_image'];
							echo "'>";
							echo "<input type='submit' value='effacer'>";
							echo "</form>";	
	
					}
					else 
					{
						$row=$results->fetch_array (MYSQLI_ASSOC); 
						echo "<h2>";
						echo $row['description'];
						echo "</h2>";
						echo "<br/>";
						echo "<img class='grande' alt='image' src=../images/photographies/";
								echo $row['fichier_image'];
								echo">";
						echo "<br/>";
						echo "<ul>";
							echo "<li>";				
								echo "Photographie prise par ";
								echo $row['auteur'];
								echo " le ";
								echo $row['date_prise_vue'];
							echo "</li>";
							echo "<li>";				
								echo "Lieu :  Quartier ";
								echo $row['quartier'];
								echo " : ";
								echo $row['description'];
								echo " (époque : ";
									echo $row['epoque'];
								echo ").";
							echo "</li>";
							echo "<li>";				
								echo "Type : ";
								echo $row['type'];
							echo "</li>";
							echo "<li>";				
								echo "Couleur : ";
								echo $row['couleur'];
							echo "</li>";
						echo "</ul>";
					}
					$idcom->close();
				?>
				<br />
				<div id="map-canvas2"></div>
			</article>
		</section>
		<footer>
			<p><a href="footer.html#contacts"> Contacts & crédits </a> &#169; <a href="footer.html#copyright"> Mentions légales & copyright </a> Amis du Vieux Lyon</p>
		</footer>
	</div>
	</body>
</html>