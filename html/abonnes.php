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
	 	<h1>Espace Abonné</h1>  
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
	 			echo " ! </h2> 
	 			<p>Dans cet espace, vous pourrez suivre les actualités de notre association (visites du Vieux Lyon, spectacles, 
	 			expositions, conférences, etc.).
				D'autre part, vous pouvez désormais gérer les photographies que les utilisateurs ont chargées.</p>";
				echo "<br />";
	 			echo "<a href='modification.php'>Modifications de vos photographies en attente de validation</a>";
	 			echo "<br />";
	 			echo "<a href='administrateur.php'>Ajout / Suppression des photographies ajoutées par les membres.</a>";	
				echo "<br />";
				echo "<a href='ajout.php'>Accéder au formulaire d'ajout d'image</a>";
	 			echo "<br />";
	 			echo "<p>D'autre part, cette page membre vous permet également d'accéder à la documentation de notre site, 
	 			c'est-à-dire le journal de bord de notre projet, ainsi qu'une aide pour les 
	 			administrateurs.</p>";
	 			echo "<br />";
	 			echo "<a href='../PDF/journal_de_bord.pdf'>Journal de bord du projet</a>";
	 			echo "<br />";
	 			echo "<a href='../PDF/guide_administrateur.pdf'> Guide de l'administrateur </a> ";	
	 			echo"</article>"; 		
	 		}
	 		elseif (isset($_SESSION['authentifie'])) 
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
	 			echo " ! </h2> 
	 			<p>Dans cet espace, vous pourrez suivre les actualités de notre association (visites du Vieux Lyon, spectacles, 
	 			expositions, conférences, etc.).
				D'autre part, vous pouvez désormais enrichir notre collection de photographies du Vieux Lyon. Ainsi, vous pourrez 
				contribuer à la valorisation de notre cher patrimoine.</p>";
				echo "<br />";
				echo "<a href='ajout.php'>Accéder au formulaire d'ajout d'image</a>";
				echo "<br />";
	 			echo "<a href='modification.php'>Modifications de vos photographies en attente de validation</a>";
	 			echo "<br />";
	 			echo "<p>D'autre part, cette page membre vous permet également d'accéder à la documentation de notre site, 
	 			c'est-à-dire le journal de bord de notre projet, ainsi qu'une aide pour les 
	 			utilisateurs.</p>";
	 			echo "<br />";
	 			echo "<a href='../PDF/journal_de_bord.pdf'>Journal de bord du projet</a>";
	 			echo "<br />";
	 			echo "<a href='../PDF/guide_utilisateur.pdf'> Guide de l'utilisateur </a> ";
	 			echo"</article>"; 				
	 		}
	 		else 
	 		{
	 			echo " 
	 			<article id='article_simple'>
	 				<div id='abonnes'>
	 				<div id='inscription'>
	 				<h2>Inscription</h2>
					 	<form method='post' action='membre_ajout.php'>
					 	<ul > 
					 			<li> Votre nom d'utilisateur : </li>
					 			<li> <input type='text' name='login'/> </li>
					 			
					 			<li> Votre adresse email : </li> 
					 			<li> <input type='email' name='email_ajout'/> </li>
					 			  
					 			<li> Votre mot de passe : </li>
					 			<li> <input type='password' name='password_ajout'/> </li>
					 			
					 			<li> <input type='submit' name='submit' value='Inscription'> </li>
					 		
					 	</ul>
					 	</form>
					 </div>
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