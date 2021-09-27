<?php
include("include/entete.php");
include("include/menu.php");
$bdd = new PDO('mysql:host=localhost;dbname=projweb2;charset=utf8)','root','');

?>

<form METHOD="POST">
	<table>
	
		<tr>
			<p>
				<th>Annee/Autre</th>
				<th>Action/Competence</th>
			</p>
		</tr>
		<tr>
			<p>
				<td><input type="text" name="anneeAutre" required="required" size="40"></td>
				<td><input type="text" name="actionCompetence" required="required" size="40"></td>
			</p>
		</tr>

		<td><input type="submit" name="EnregistreCompetence" value="Enregistrer Competence"></td>
    
	</table>
</form>

<?php
if(isset($_POST["EnregistreCompetence"]))
{
	$recupanneeAutre= $_POST["anneeAutre"];
	$recupactionCompetence= $_POST["actionCompetence"];

	$recupAllanneeAutreDB='SELECT* from competence where anneeAutre=:anneeAutreStocks && actionCompetence=:actionCompetenceStocks';
	$vardataCv=$bdd->prepare($recupAllanneeAutreDB);
	$vardataCv->execute(array(
		'anneeAutreStocks' =>$recupanneeAutre,
		'actionCompetenceStocks' =>$recupactionCompetence
	));
$count=$vardataCv->rowCount();
if($count>0)
	{
		echo "<SCRIPT type='text/javascript'>alert(' CV Exist deja !!');</SCRIPT>";	
	}
else
{


	$insertionanneeAutre= $bdd->prepare('INSERT INTO Competence(anneeAutre, actionCompetence)VALUES(:anneeAutre,:actionCompetence)');
	$insertionanneeAutre->execute(array('anneeAutre' =>$recupanneeAutre,'actionCompetence' =>$recupactionCompetence));

header("Location: Accueil.php");
}
}

?>