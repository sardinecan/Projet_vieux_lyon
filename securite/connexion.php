<?php
	$serveur="localhost";
	$utilisateur="root";
	$motdepasse="";
	$base="ami_vieux_lyon";
	$idcom=new mysqli ($serveur,$utilisateur, $motdepasse, $base); // pour se connecter à la base
	if (function_exists('mysqli_set_charset')) 
	{
		mysqli_set_charset($idcom, 'utf8');
	}
	else
	{
		mysqli_query($idcom, 'SET NAMES utf8');
	}
?>