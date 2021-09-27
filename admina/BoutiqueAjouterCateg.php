<?php
include("include/entete.php");
include("include/menu.php");
?>

<div id="responsive">

<div id="boutique">

<form METHOD="POST">

<h1>Ajouter Catégorie</h1>
    <table>

			<tr>
				<p>
			 		<td><label> Nom Catégorie:</label></td>
					<td><input type="text" valeur="text"placeholder="Entrer Categorie" name="categorie" required="required" size="40"></td>
				</p>
			</tr>

			<tr>
				<p>
		 			<td><label>Description:</label></td>
					<td><input type="text" valeur="text"placeholder="Entrer Description" name="description" required="required" size="40"></td>
				</p>
			</tr>

			<tr>
				<td></td>
				<td><input id="submit" type="submit" id="" name="Ajouter" value="Ajouter"></td>
			</tr>

		</table>
		</form>
	</div>

<?php
if(isset($_POST["Ajouter"]))
{
	$recupNomCateg= $_POST["categorie"];
	$recupDescription= $_POST["description"];
	

	$recupAllcategorie='SELECT* from categorie where nomCateg=:nomCategStocks, description=:descriptionStocks';

	$vardataCategorie=$bdd->prepare($recupAllcategorie);
	$vardataCategorie->execute(array(
		'nomCategStocks' =>$recupNomCateg,
		'descriptionStocks' =>$recupDescription
		));
$count=$vardataCategorie->rowCount();
if($count>0)
	{
		echo "<SCRIPT type='text/javascript'>alert(' Vous etez deja notre client connectez-vous a droite de l'inscription!!');</SCRIPT>";	
	}
else
{
	$EnregistreCategorie= $bdd->prepare('INSERT INTO categorie(nomCateg, description)VALUES(?,?)'); //les ??? sont les contenus du titleClient,email,.. 
	$EnregistreCategorie->execute(array($recupNomCateg, $recupDescription
	));

header("Location: BoutiqueAjouterCateg.php");
}
}

?>

<?php
include("include/footer.php");
?>

</div>

<style>
h1{
	margin-left: 420px;
	color: #444766
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
	padding:5px;
	font-size: 20px;
}
td a{
	background-color: #c4007e;
	color: white;
	padding:10px;
	font-size: 20px;
	text-decoration: none;
}

 </style>



