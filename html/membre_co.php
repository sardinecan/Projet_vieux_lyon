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
			<h1>Connexion</h1>
			<div id="reponse">
				<?php
 					require '../securite/connexion.php';
					$email_co=$_POST['email_co'];
					$login=$_POST['login'];
					$password_co=$_POST['password_co'];
				
					$email_co = trim($email_co);
					$login = trim($login);
					$password_co = trim($password_co);

					if ($login=='' OR $password_co=='' OR $email_co=='') 
					{ 
						echo "<div class='rep'>";
						echo "Vous n'avez pas renseigné tous les champs.";
						echo "<br/>";
						echo "<a href='abonnes.php'> Retour à la page précédente </a>";
						echo "<br/>";
						echo "</div>";
					} 
					$result=$idcom->query("SELECT * from administrateur 
						WHERE email LIKE '$email_co' and password 
						LIKE '$password_co' AND login LIKE '$login' LIMIT 1");
					if ($result->num_rows==1)
					{
						$_SESSION['authentifie']="oui";
						$_SESSION['admin']=$login;
						echo "<div class='rep'>";
						echo "Bienvenue cher $login";
						echo "<br/>";
						echo "<a href='abonnes.php'>Accédez à votre espace</a>";
						echo "</div>";
					}	
					else
					{
						$password_co=crypt($password_co, "xta");
						$results=$idcom->query("SELECT * from membres 
						WHERE email LIKE '$email_co' and password LIKE '$password_co' AND login LIKE '$login' LIMIT 1");
			
						if ($results->num_rows==1) 
						{
							$_SESSION['authentifie']="oui";
							$_SESSION['login']=$login;
							echo "<div class='rep'>";
							echo "Bienvenue $login"; 
							echo "<br/>";
							echo "<a href='abonnes.php'>Accédez à votre espace membre</a>";
							echo "<br/>";
							echo "</div>";
						}
						else 
						{
							echo "<div class='rep'>";
							echo "Vous n'êtes pas authentifié.";
							echo "</div>";
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
