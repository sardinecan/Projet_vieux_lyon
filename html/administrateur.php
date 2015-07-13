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
 			<ul id="menu"><!--whitespace -->
 				<li><a href="../index.html">Accueil</a></li><!--whitespace -->
 				<li><a href="presentation.html">Présentation</a></li><!--whitespace -->
 				<li><a href="galerie.html">Galerie</a></li><!-- -->
 				<li><a href="abonnes.php">Espace abonnés</a></li> 
 			</ul> 
 		</nav>
 	</header> 
 	<section>
 		<h1>Espace Administrateur</h1>  
 		<?php
 			require '../securite/connexion.php';
 			if (isset($_SESSION['authentifie']) && isset($_SESSION['admin'])) 
 			{
 				echo "
 				<aside class='page_membres'>
 				<h2>Effectuez une recherche</h2>
					<form method='post' action='interrogation_bdd.php'>
			   				<p>
			       				<label>Sélectionnez un type de bâtiment :</label><br/>
			       				<select name='theme'>
			       						<option label='tous les thèmes'></option>
			          					<option>rues</option>
			          					<option>traboules</option>
			          					<option>monuments</option>
			          					<option>facades</option>
			          					<option>divers</option>
			       				</select>
			   				</p>
			   				<p>
			   					<label>Sélectionnez une époque :</label><br/>
								<select name='epoque'>
									<option label='toutes les époques'></option>
									<option>Moyen-age</option>
									<option>Renaissance</option>
									<option>XIXe</option>
									<option>autre</option>
								</select>
							</p>
							<p>
			   					<label>Sélectionnez un quartier :</label><br />
			          			<input type='radio' name='quartier' value='Saint Jean' /> <label>Saint Jean</label><br />
			   	   				<input type='radio' name='quartier' value='Saint Paul'  /> <label>Saint Paul</label><br />
			 	   				<input type='radio' name='quartier' value='Saint Georges' /> <label>Saint Georges</label><br />
			 	   				<input type='radio' name='quartier' value='' checked/> <label>Pas de restriction</label><br />
			   				</p>
			   				<p>
			   					<label>Sélectionnez un type:</label><br/>
			   					<select name='type'>
			   					<option label='Tous les types'></option>
			   						<option>Argentique</option>
			   						<option>Numérique</option>
			   					</select>
			   				</p>
			   				<input value='Rechercher' type='submit'/> 
						</form>
					</aside>";
 				echo "<article class='page_membres'>";
 				echo "<h2>Bienvenue ";
 				echo $_SESSION['login'] ;
 				echo " ! </h2>";
	 			$results=$idcom->query("SELECT * FROM upload");
 

	 			if ($results->num_rows==0) 
	 			{
	 				echo "Il n'y a pas de photographie en attente de validation";
	 			}
	 			else 
	 			{
	 				echo "<div id='mosaic'>";
	 				echo " <div id='img_validation'> Photographies en attente de validation : </div>";
	 			//{
					//ajout à partir d'ici
					echo "<ul>";	 					
		 				while ($row=$results->fetch_array (MYSQLI_ASSOC))
		 				{
							echo "<li>";
							echo "<figure>";
								echo "<img alt='image' src=../images/photographies/";
								echo $row['up_filename'];
								echo">";
								echo "<div>";
									echo "Membre:";
									echo $row['up_id_membre'];
									echo "<br /> ";
									echo "Auteur : ";
									echo $row['up_auteur'];
									echo "<br /> ";
									echo "Quartier : ";
									echo $row['up_quartier'];
									echo "<br /> ";
									echo $row['up_date'];
									echo "<br /> ";
									echo "<br /> ";
									echo "Cliquez valider la photographie :";
										echo "<form action='administrateur_validation.php' method='post' class='verif_img_admin'>";
										echo "<input type='hidden' name='up_auteur' value='";
										echo $row['up_auteur'];
										echo "'>";
										echo "<input type='hidden' name='up_theme' value='";
										echo $row['up_theme'];
										echo "'>";
										echo "<input type='hidden' name='up_epoque' value='";
										echo $row['up_epoque'];
										echo "'>";
										echo "<input type='hidden' name='up_quartier' value='";
										echo $row['up_quartier'];
										echo "'>";
										echo "<input type='hidden' name='up_type' value='";
										echo $row['up_type'];
										echo "'>";
										echo "<input type='hidden' name='up_latitude' value='";
										echo $row['up_latitude'];
										echo "'>";
										echo "<input type='hidden' name='up_longitude' value='";
										echo $row['up_longitude'];
										echo "'>";
										echo "<input type='hidden' name='up_description' value='";
										echo $row['up_description'];
										echo "'>";
										echo "<input type='hidden' name='up_date' value='";
										echo $row['up_date'];
										echo "'>";
										echo "<input type='hidden' name='up_couleur' value='";
										echo $row['up_couleur'];
										echo "'>";
										echo "<input type='hidden' name='up_filename' value='";
										echo $row['up_filename'];
										echo "'>";
										echo "<input type='hidden' name='up_id_membre' value='";
										echo $row['up_id_membre'];
										echo "'>";
										echo "<input type='submit' value='ajouter'>";
										echo "</form>";	
						//formulaire d'effacement
										echo "<br/>";
										echo "Cliquez effacer la photographie :";
										echo "<form action='administrateur_suppression.php' method='post' class='verif_img_admin'>";
										echo "<input type='hidden' name='id_upload' value='";
										echo $row['id_upload'];
										echo "'>";
										echo "<input type='hidden' name='up_auteur' value='";
										echo $row['up_auteur'];
										echo "'>";
										echo "<input type='hidden' name='up_theme' value='";
										echo $row['up_theme'];
										echo "'>";
										echo "<input type='hidden' name='up_epoque' value='";
										echo $row['up_epoque'];
										echo "'>";
										echo "<input type='hidden' name='up_quartier' value='";
										echo $row['up_quartier'];
										echo "'>";
										echo "<input type='hidden' name='up_type' value='";
										echo $row['up_type'];
										echo "'>";
										echo "<input type='hidden' name='up_latitude' value='";
										echo $row['up_latitude'];
										echo "'>";
										echo "<input type='hidden' name='up_longitude' value='";
										echo $row['up_longitude'];
										echo "'>";
										echo "<input type='hidden' name='up_description' value='";
										echo $row['up_description'];
										echo "'>";
										echo "<input type='hidden' name='up_date' value='";
										echo $row['up_date'];
										echo "'>";
										echo "<input type='hidden' name='up_couleur' value='";
										echo $row['up_couleur'];
										echo "'>";
										echo "<input type='hidden' name='up_filename' value='";
										echo $row['up_filename'];
										echo "'>";
										echo "<input type='hidden' name='up_id_membre' value='";
										echo $row['up_id_membre'];
										echo "'>";
										echo "<input type='submit' value='effacer'>";
										echo "</form>";
								echo "</div>";
								echo "<figcaption>";
								echo $row['up_description'];
								echo "</figcaption>";
								echo "</figure>";
								echo "</li>";
		 				}
		 			echo "</ul>";
				}	
	 			echo "</div>";
	 			echo"</article>"; 				
 			}
 			else 
 			{
 				echo " 
 				<article id='article_simple'>
 					<div id='abonnes'>
					 <div id='connexion'>
					 <h2>Connexion</h2>
					 <form method='post' action='membre_co.php'> 	
					 	<ul >					 		
					 			<li> Votre nom d'utilisateur : </li>
					 			<li> <input type='text' name='login'/> </li>

					 			<li> Votre adresse email : </li> 
					 			<li> <input type='email' name='email_co'/> </li>
					 			 
					 			<li> Votre mot de passe : </li>
					 			<li> <input type='password' name='password_co'/> </li>
						 			
					 			<li> <input type='submit' name='submit' value='Connexion'> </li>				 		
					 	</ul>
					 	</form>
				 	</div>
				 	</div>
				</article>"; 
			} 
			$idcom->close();
		?>
 	</section>
	<footer>
		<p><a href="footer.html#contacts"> Contacts & crédits </a> &#169; <a href="footer.html#copyright"> Mentions légales & copyright </a> Amis du Vieux Lyon</p>
	</footer>
</div> 
</body> 
</html>