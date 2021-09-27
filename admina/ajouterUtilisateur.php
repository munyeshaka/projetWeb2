<?php
include("include/entete.php");
include("include/menu.php");
?>


<h1>Formulaire d'inscription comme utilisateur</h1>
<div id="utilisa">
	<form METHOD="POST">
	<table>
		<tr>
			<p>
				<th>Nom:</th>
				<td><input type="text" valeur="text"placeholder="Entrer votre Nom" name="utilisateurNom" required="required" size="40"></td>
			</p>
		</tr>

		<tr>
			<p>
				<th>Mot de pass:</th>
				<td><input type="password" name="motPass" required="required" size="40"></td>
			</p>
		</tr>
		<tr>
			<p>
				<th></th>
				<td><input type="submit" name="EnregistreUtilisateur" value="Enregistre">
				<input type="reset" name="EnregistreUtilisateur" value="Annuler"></td>
			</p>

	</table>
</form>
</div>

<?php
if(isset($_POST["EnregistreUtilisateur"]))
{
	$recupUtilisateurNom= $_POST["utilisateurNom"];
	$recupUtilisateurMotPass= $_POST["motPass"];

	$recupNomMotPassBD='SELECT* from utilisateur where nom=:nomStocks && motPass=:motPassStocks';
	$vardataUtilisateur=$bdd->prepare($recupNomMotPassBD);
	$vardataUtilisateur->execute(array(
		'nomStocks' =>$recupUtilisateurNom,
		'motPassStocks' =>$recupUtilisateurMotPass
	));
$count=$vardataUtilisateur->rowCount();
if($count>0)
	{
		echo "<SCRIPT type='text/javascript'>alert(' Utilisateur Exist deja !!');</SCRIPT>";	
	}
else
{
	$EnregistreUtilisateur= $bdd->prepare('INSERT INTO utilisateur(nom, motPass)VALUES(:nom,:motPass)'); //contenu du nom,prenom,mot dee passe
	$EnregistreUtilisateur->execute(array(
		'nom' =>$recupUtilisateurNom,
		'motPass' =>$recupUtilisateurMotPass
	));
header("Location: Accueil.php");
}
}

?>
<style>

h1{
	color: #444766;
	padding-left: 250px;
}

#utilisa{
	position: absolute;
	border-radius: 20px;
	padding: 20px;
	padding-right: 200px;
	margin-left: 210px;
	top: 270px;
	width: 440px;
	height: 160px;
	background-color: #444766;	
}
#utilisa th{
	color: white;
	font-family: cursive;
}
</style>