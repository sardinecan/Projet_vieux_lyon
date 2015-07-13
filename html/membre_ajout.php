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
			<h1>Inscription</h1>
			<div id="reponse">
				<?php
		 			require '../securite/connexion.php';
    				$login=$_POST['login']; 
    				$password_ajout=$_POST['password_ajout']; 
					$email_ajout=$_POST['email_ajout'];
		
					$email_ajout = trim($email_ajout);
					$login = trim($login);
					$password_ajout = trim($password_ajout);
		
					$results=$idcom->query("SELECT * FROM membres 
											WHERE login LIKE '$login'");
					
					if ($results->num_rows>=1)
					{
						echo "ce login est déjà pris.";
					}
					else
					{
					    if ($login=='' OR $password_ajout=='' OR $email_ajout=='') 
						{ 
    			        	echo "<div class='rep'>";
    			        	echo "Vous n'avez pas renseigné tous les champs."; 
    			        	echo "<br />";
							echo "<a href='abonnes.php'> Retour à la page précédente </a>";
							echo "</div>";
						} 
						elseif ($login=="login") 
						{
							echo "<div class='rep'>";
							echo "Vous ne pouvez pas utiliser ce login.";
							echo "<br />";
							echo "<a href='abonnes.php'> Retour à la page précédente </a>";
							echo "</div>";
						}
						elseif ($email_ajout=="password" OR $email_ajout=="motdepasse") 
						{
							echo "<div class='rep'>";
							echo "Vous ne pouvez pas utiliser ce mot de passe.";
							echo "<br />";
							echo "<a href='abonnes.php'> Retour à la page précédente </a>";
							echo "</div>";
						}
						elseif (strlen($password_ajout)<6)
						{
							echo "<div class='rep'>";
							echo "Mot de passe trop court";
							echo "<br />";
							echo "<a href='abonnes.php'> Retour à la page précédente </a>";
							echo "</div>";
						}
    					else 
						{
    		        		$password_ajout=crypt($password_ajout,"xta");
    		        		$idcom->query("INSERT INTO membres(login, password, email) VALUES('$login', '$password_ajout', '$email_ajout')");
    		    			//mettre une navigation ou un message pour prévenir de la réussite de l'abonnement
    		    			echo "<div class='rep'>";
    		    			echo "Vous êtes bien inscrit";
    		    			echo "<br/>";
    		    			echo "<a href='abonnes.php'> Accédez à votre espace. </a>";
    		    			echo "<br/>";
    		    			echo "</div>";
    		    			$_SESSION['authentifie']="oui";
    		    			$_SESSION['login']=$login;		
	    		    	}
    		    	}
    				$idcom->close(); 
   				?>
   			</div>
   		</section>
		<footer>
			<p><a href="footer.html#contacts"> Contacts & crédits </a> &#169; <a href="footer.html#copyright"> Mentions légales & copyright </a> Amis du Vieux Lyon</p>
		</footer>
	</div>
   </body>
</html>