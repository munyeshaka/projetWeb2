<?php
include("include/entete.php");
include("include/menu.php");

$affichageCommentaire= $bdd->query("SELECT* from commentaire where idCommentaire='".$_GET["Modifier"]."'");
$dataCommentaire= $affichageCommentaire->fetch();

?>

<form method="POST">
<fieldset>
	<h1>Modifier Commentaire</h1>
		<tr>
			<td id="">Contenu Commentaire:</td>
			<td><textarea name="Commentaire" size="35" required="required"/>
			<?php echo $dataCommentaire["commentaire"];?>
				
			</textarea></td>

			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="modifier" name="modifier">
				<td><input type="reset" value="Annuler"></td>
			</tr>

		</tr>

</form>
</fieldset>


<?php
if(isset($_POST["modifier"]))
{
	$recupCommentaire= $_POST["Commentaire"];

	$modifierCommentaire= $bdd->EXEC("UPDATE commentaire set commentaire='".$recupCommentaire."' where idCommentaire='".$_GET["Modifier"]."'");

// on exécute la requête (mysql_query) et on affiche un message au cas où la requête ne se passait pas bien (or die)
	mysql_query($modifierCommentaire) or die('Erreur SQL !'.$modifierCommentaire.'<br />'.mysql_error());

	// on ferme la connexion à la base
	mysql_close();

header("Location: BlogCommentaire.php");
}

?>

<style>
fieldset {
	

	position: absolute;
	border-radius: 20px;
	margin-left: 200px;
	top: 200px;
	color: white;
	height: 70px;
	background-color: #444766;
	padding:120px;	
}

textarea{
	height: 50px;
	width: 250px;
}	
</style>