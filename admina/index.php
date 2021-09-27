
<?php
SESSION_START();
//session.gc_maxlifetime(120);
//session_destroy();
$bdd = new PDO('mysql:host=localhost;dbname=projweb2;charset=utf8)','root','');
?>

<div id="pgconx"><h1>Page de Connexion</h1></div>

<form METHOD="POST">
	<fieldset id="connexion">
		<legend><img src="media/imgPP.png" id="pp" alt="photo profil"></legend>
		<table>

			<tr>
				<td><label>Nom d'utilisateur:</label></td>
				<td id=""><input type="text" pattern="[A-Z][a-z]{2,}" placeholder="Entrer votre Nom" name="utilisateurNom" required="required" size="20"></td>
			</tr>

			<tr>
				<td><label>Mot de pass</label></td>
				
				<td><input type="password" name="motPass" size="20"></td>
			</tr>
			<tr>
				<td></td>
				<td id=""><input type="submit" id="" name="Connexion" value="connectez-vous">
				</td>
			</tr>
	</table>
</fieldset>
</form>
<?php

if(isset($_POST["Connexion"]))
{
	$recupUtilisateurNom= $_POST["utilisateurNom"];
	$recupUtilisateurMotPass= $_POST["motPass"];
	$_SESSION["Login"]=$recupUtilisateurNom;

	$recupNomMotPassBD='SELECT* from utilisateur where nom=:nomStocks && motPass=:motPassStocks';

	$vardataUtilisateur= $bdd->prepare($recupNomMotPassBD);
	$vardataUtilisateur->execute(array('nomStocks'=>$recupUtilisateurNom,'motPassStocks' =>$recupUtilisateurMotPass));

$count=$vardataUtilisateur->rowCount();
if($count>0)
	{
		header("Location:Accueil.php");
	}
else
{
	echo 'Nom utilisateur ou  Mot de passe incorrect,  Réessayez  encore';	
}
}
?>

<style>
#pgconx{
	background-color: #444766;
	color: white;
	padding: 5px;
}
#pgconx h1{
	margin-left: 50px;	
}
fieldset {
	position: absolute;
	border-radius: 20px;
	margin-left: 340px;
	top: 120px;
	height: 70px;
	background-color: #444766;
	padding:150px;	
}
legend{
	margin-left:110px;
}
#pp{
	border-radius: 80px;
	width: 120px;
	height: 120px;
}
td{
	color: white;
	font-family: cursive;
}
</style>
