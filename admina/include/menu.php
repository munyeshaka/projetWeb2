
<?php

$bdd = new PDO('mysql:host=localhost;dbname=projweb2;charset=utf8)','root','');

?>

<meta charset="utf-8"/>
<div id="responsive">

<div id="menu">

	<ul>
		<li><a href="Accueil.php">Accueil</a></li>
		<li><a href="Exercices.php">Exercices</a></li>
		<li><a href="Corrections.php">Corrections</a></li>
		<li><a href="Blog.php">Blog</a></li>
		<li><a href="boutique.php">Boutique</a></li>
		<li><a href="forum.php">Forum</a></li>
		<li><a href="ContactezNous.php">Contactez-nous</a></li>
		<li><a href="listUtilisateur.php">Utilisateurs</a></li>

	</ul>	
</div>

<style>
#menu {
	background: #444766;
	display: flex;
	color:white;
	align-items: center; 
	justify-content:space-around;
	text-decoration: none;
	padding: 20px;
 }

#menu ul li{
	display: inline-block;
	color: white;
	text-decoration: none;	
}
#menu ul li a{
	text-decoration: none;
	color: white;
	padding-left: 5px;
	padding-right: 5px;
	font-size: 20px;
}
#menu a:visited,a:focus{
	background-color: #15acd0;

}
#responsive{
	width: 100%;
	margin: 0 auto;
}

</style>
