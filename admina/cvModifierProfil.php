<?php
include("include/entete.php");
include("include/menu.php");

$affichageProfil= $bdd->query("SELECT* from profil where idProfil='".$_GET["Modifier"]."'");
$dataProfil= $affichageProfil->fetch();

?>

<form method="POST">
<fieldset>
	<h1>Modifier Profil</h1>
		<tr>
			<td><textarea name="newprofil" size="35" required="required"/>
			<?php echo $dataProfil["profil"];?>	
			</textarea></td>

		</tr>
		<tr>
				<td></td>
				<td><input type="submit" value="modifier" name="modifier"></td>
				<td><input type="reset" value="Annuler"></td>
		</tr>

</form>
</fieldset>
<?php
if(isset($_POST["modifier"]))
{
	$recupProfil= $_POST["newprofil"];

	$modifierProfil= $bdd->EXEC("UPDATE profil set profil='".$recupProfil."' where idProfil='".$_GET["Modifier"]."'");

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