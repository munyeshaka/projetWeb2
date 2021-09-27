<?php
include("include/entete.php");
include("include/menu.php");

$affichageCV= $bdd->query("SELECT* from competence where idCompetence='".$_GET["Modifier"]."'");
$dataCV= $affichageCV->fetch();

?>

<form method="POST">
<fieldset>
	<h1>Modifier Competence en informatique</h1>
		<tr>
			<td><textarea name="anneeAutre" size="35" required="required"/>
			<?php echo $dataCV["anneeAutre"];?>	
			</textarea></td>
			<td><textarea name="actionCompetence" size="35" required="required"/>
			<?php echo $dataCV["actionCompetence"];?>	
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
	$recupAnneeAutre= $_POST["anneeAutre"];
	$recupActionCompetence= $_POST["actionCompetence"];

	$modifierAnneeAutre= $bdd->EXEC("UPDATE competence set anneeAutre='".$recupAnneeAutre."' where idCompetence='".$_GET["Modifier"]."'");
	$modifierActionCompetence= $bdd->EXEC("UPDATE competence set actionCompetence='".$recupActionCompetence."' where idCompetence='".$_GET["Modifier"]."'");



header("Location: Accueil.php");
}

?>
<style>
fieldset {
	

	position: absolute;
	border-radius: 20px;
	margin-left: 260px;
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