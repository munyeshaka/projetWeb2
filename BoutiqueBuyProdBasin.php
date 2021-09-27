<?php
include("include/entete.php");
include("include/menu.php");
?>

<div id="responsive">

<?php
	
	$affichagBuyBasin= $bdd->query("SELECT* from prodbasin where idProdBasin='".$_GET["buy"]."'");

	$dataProdBasin= $affichagBuyBasin->fetch();
	 
?>
		<div id="basin">
			<br>
		<tr>

      		<td><a id="a" href="BoutiquePay.php"><?php echo '<img style="height:200px; width:200px;" src="media/'.$dataProdBasin["photo"].'">';?></a></td>

      	</tr>
      </div>
		
	<div id="boutique">
		<form METHOD="POST">
		<table>

			<tr>
				<p>
		 			<td><label>Quantite:</label></td>
					<td><input type="number" valeur="quantite"placeholder="Entrer quantite produit" name="quantite" required="required" size="40"></td>
				</p>
			</tr>

			<tr>
				<p>
		 			<td><label>Compte Banquaire:</label></td>
					<td><input type="text" valeur="text" placeholder="Entrer votre Compte Banquaire " name="bank" required="required" size="40"></td>
				</p>
			</tr>

			<tr>
				<p>
		 			<td><label>Nom:</label></td>
					<td><input type="text" valeur="text"placeholder="Entrer votre Nom" name="Nom" required="required" size="40"></td>
				</p>
			</tr>

			<tr>
				<p>
		 			<td><label>Mail:</label></td>
					<td><input type="text" valeur="text" placeholder="Entrer votre Mail" name="Mail" required="required" size="40"></td>
				</p>
			</tr>


			<tr>
				<p>
		 			<td><label>Ville:</label></td>
					<td><input type="text" valeur="text"placeholder="Entrer votre Ville" name="Ville" required="required" size="40"></td>
				</p>
			</tr>

			<tr>
				<p>
			 		<td><label>Code Postal:</label></td>
					<td><input type="text" valeur="text"placeholder="Entrer votre code Postal" name="codePostal" required="required" size="40"></td>
				</p>
			</tr>

			<tr>
				<p>
			 		<td><label>Addresse:</label></td>
					<td><input type="text" valeur="text"placeholder="Entrer votre Adresse" name="Addresse" required="required" size="40"></td>
				</p>
			</tr>

			<tr>
				<p>
			 		<td><label>Mot de passe:</label></td>
					<td><input type="text" valeur="text"placeholder="Entrer votre mot de Passe" name="motPass" required="required" size="40"></td>
				</p>
			</tr>

			<tr>
				<td></td>
				<td><input id="submit" type="submit" id="" name="Acheter" value="Acheter"></td>
			</tr>

		</table>
		</form>
	</div>

<?php
if(isset($_POST["Acheter"]))
{
	$demande= $bdd->query('SELECT * from prodbasin where idProdBasin ="'.$_GET["buy"].'"');
	$data= $demande->fetch();
	$ret= $data["stock"];
	$quantite= $_POST["quantite"];
	if($ret>=$quantite && $ret!=0)
	{
		$rest=$ret-$quantite;
		$dimune= $bdd->query("UPDATE prodbasin set stock='".$rest."' where idProdBasin='".$data["idProdBasin"]."'");
	}
}
?>

<?php
if(isset($_POST["Acheter"]))
{
	$recupQuantite= $_POST["quantite"];
	$recupBank= $_POST["bank"];
	$recupNomClient= $_POST["Nom"];
	$recupMail= $_POST["Mail"];
	$recupVille= $_POST["Ville"];
	$recupCodePostal= $_POST["codePostal"];
	$recupAddresse= $_POST["Addresse"];
	$recupMotDePasse= $_POST["motPass"];
	

	$recupAlldeClient='SELECT* FROM client where quantite=:quantiteStocks, compteBank=:bankStocks, nomClient=:nomStocks, email=:mailStocks, ville=:villeStock, codePostal=:codePostalStocks, Addresse=:addresseStocks, motPass=:motPassStocks';

	$vardataClient=$bdd->prepare($recupAlldeClient);
	$vardataClient->execute(array(

		'quantiteStocks' =>$recupQuantite,
		'bankStocks' =>$recupBank,
		'nomStocks' =>$recupNomClient,
		'mailStocks' =>$recupMail,
		'villeStock' =>$recupVille,
		'codePostalStocks' =>$recupCodePostal,
		'addresseStocks' =>$recupAddresse,
		'motPassStocks' =>$recupMotDePasse
	));
$count=$vardataClient->rowCount();
if($count>0)
	{
		echo "<SCRIPT type='text/javascript'>alert(' Vous etez deja notre client connectez-vous a droite de l'inscription!!');</SCRIPT>";	
	}
else
{
	$EnregistreUtilisateur= $bdd->prepare('INSERT INTO client(quantite, compteBank, nomClient, email, ville, codePostal, addresse, motPass)VALUES(?,?,?,?,?,?,?,?)'); //les ??? sont les contenus du nomClient,email,.. 
	$EnregistreUtilisateur->execute(array($recupQuantite,$recupBank,$recupNomClient,$recupMail, $recupVille, $recupCodePostal, $recupAddresse, $recupMotDePasse
	));
header("Location: boutique.php");
}
}

?>

<?php
include("include/footer.php");
?>

</div>

<style>
h1{
	margin-left: 385px;
}

table{
	background-color: #0fa9cf;
	color: white;
	padding:10px;
	margin-left: 400px;
	border-radius: 10px;
}
#submit{
	background-color: #c4007e;
	color: white;
	padding:10px;
	font-size: 20px;
}
td a{
	background-color: #c4007e;
	color: white;
	padding:10px;
	font-size: 20px;
	text-decoration: none;
}
#a{
	margin-left: 520px;
}

</style>
