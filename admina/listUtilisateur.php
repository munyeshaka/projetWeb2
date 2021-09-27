<?php
include("include/entete.php");
include("include/menu.php");
?>

<?php

$affichageUtilisateur= $bdd->query('SELECT* from utilisateur order by idUtilisateur Desc limit 8');
if(isset($_GET["supp"]))
{
	$suppressionUtilisateur= $bdd->query("DELETE from utilisateur where idUtilisateur='".$_GET["supp"]."'");
}

?>
<h1>
	<a id="" href="ajouterUtilisateur.php">ajouter un Utilisateur</a>
</h1>
<div id="">
	<dir id="">
	<table>
	<tr>
		<th>Nom</th>
		<th>Mot de passe</th>
		<th colspan="2">Actions</th>
	</tr>
	<?php
	while($dataUtilisateur= $affichageUtilisateur->fetch())
	 {
		?>
		<tr>
			<td><?php echo $dataUtilisateur["nom"];?></td>
			<td><?php
				$motPassCrypte=md5($dataUtilisateur["motPass"]);
				echo "$motPassCrypte";?></td>

		<td id="css"><a onclick="return(confirm('Voulez-vous vraiment supprimer cet enregistrement??')); "id="" href="listAuteurUtilisateur.php?supp=<?php echo $dataUtilisateur["idUtilisateur"];?>">Supprimer=<a/></td>
			<td><a id="css" href="modifierUtilisateur.php?Modifier=<?php echo $dataUtilisateur["idUtilisateur"];?>">Modifier</a></td>
		</tr>
		<?php
	}
	?>
	
</table>
</div>
</div>

