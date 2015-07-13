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
		<h1>Recherche</h1>
			<aside>
				<h2>Effectuez une recherche</h2>
				<form method="post" action="interrogation_bdd.php">
	   				<p>
	       				<label>Sélectionnez un type de bâtiment :</label><br/>
	       				<select name="theme">
	       						<option label="tous les thèmes"></option>
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
			<h2>Résultats de votre requête :</h2>
				<div id="mosaic">
				<?php
 					require '../securite/connexion.php';
					//mysql_query("SET NAMES 'iso-8859-1'");
					$theme=$_POST['theme'];
					$quartier=$_POST['quartier'];
					$epoque=$_POST['epoque'];
					$type=$_POST['type'];
					if ($theme=='')
					{
						$theme="%";
					}
					if ($quartier=='')
					{
						$quartier="%";
					}
					if ($epoque=='')
					{
						$epoque="%";
					}
					if ($type=='')
					{
						$type="%";
					}
					$results=$idcom->query(
											"SELECT * FROM images
											INNER JOIN quartiers ON images.id_quartier = quartiers.id_quartier
											INNER JOIN epoques ON images.id_epoque = epoques.id_epoque
											INNER JOIN themes ON images.id_theme = themes.id_theme
											INNER JOIN auteurs ON images.id_auteur = auteurs.id_auteur 
											WHERE theme LIKE '$theme'
											AND quartier LIKE '$quartier'
											AND epoque LIKE '$epoque'
											AND type LIKE '$type'
											ORDER BY auteur
											LIMIT 0, 20
											");
						if ($results->num_rows==0)
						{
							echo "Il n'y a pas de $theme pour l'époque $epoque dans le quartier $quartier";
						}
						elseif ($results->num_rows==1)
						{
							$row=$results->fetch_array (MYSQLI_ASSOC);
							echo "<form id='form_un' action='affichage_final.php' method='POST'>";
							echo "<input type='hidden' name='id_image' value='";
							echo $row['id_image'];
							echo "'/>";
							echo "</form>";
							echo "<script>document.getElementById('form_un').submit();</script>";
						} 
						elseif ($results->num_rows>=15)
						{
							echo "Il y a plus de 15 résultats, merci d'affiner votre recherche :";
							echo "<br />";
							echo "<ul>";
							while ($row=$results->fetch_array (MYSQLI_ASSOC))
							{
								
								echo "<li>";
								echo "<figure>";
									echo "<img alt='image' src=../images/miniatures/";
									echo $row['fichier_image'];
									echo">";
									echo "<div>";
										echo "auteur : ";
										echo $row['auteur'];
										echo "<br /> ";
										echo "Quartier : ";
										echo $row['quartier'];
										echo "<br /> ";
										echo $row['date_prise_vue'];
										echo "<br /> ";
										echo "<br /> ";
										echo "Cliquez pour accéder à la fiche détaillée :";
										echo "<form action='affichage_final.php' method='POST'>";
										echo "<input type='submit' name='id_image' value='";
										echo $row['id_image'];
										echo "'/>";
										echo "</form>";
									echo "</div>";
								echo "<figcaption>";
								echo $row['description'];
								echo "</figcaption>";
								echo "</figure>";
								echo "</li>";
								
							}
							echo "</ul>";
						}
						else
						{
							echo "<br />";
							echo "<ul>";
							while ($row=$results->fetch_array (MYSQLI_ASSOC))
							{
								
								echo "<li>";
								echo "<figure>";
									echo "<img alt='image' src=../images/miniatures/";
									echo $row['fichier_image'];
									echo">";
									echo "<div>";
										echo "auteur : ";
										echo $row['auteur'];
										echo "<br /> ";
										echo "Quartier : ";
										echo $row['quartier'];
										echo "<br /> ";
										echo $row['date_prise_vue'];
										echo "<br /> ";
										echo "<br /> ";
										echo "Cliquez pour accéder à la fiche détaillée :";
										echo "<form action='affichage_final.php' method='POST'>";
										echo "<input type='submit' name='id_image' value='";
										echo $row['id_image'];
										echo "'/>";
										echo "</form>";
									echo "</div>";
								echo "<figcaption>";
								echo $row['description'];
								echo "</figcaption>";
								echo "</figure>";
								echo "</li>";
								
							}
							echo "</ul>";
						}
					$idcom->close();
				?>
				</div>
			</article>
		</section>
		<footer>
			<p><a href="footer.html#contacts"> Contacts & crédits </a> &#169; <a href="footer.html#copyright"> Mentions légales & copyright </a> Amis du Vieux Lyon</p>
		</footer>
		</div>
	</body>
</html>