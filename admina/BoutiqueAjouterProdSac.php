<?php
include("include/entete.php");
include("include/menu.php");
?>

<div id="responsive">
<h1>


<h1>
	<p><a id="a" href="BoutiqueAjouterProduit.php">Ajouter Shirt</a></p>
	<p><a id="a" href="BoutiqueAjouterProdBasin.php">Ajouter Basin</a></p>
</h1>

<div id="boutique">

<form METHOD="POST">

<h1>Ajouter Sac</h1>
    <table>

			<tr>
				<p>
		 			<td><label>title:</label></td>
					<td><input type="text" valeur="text"placeholder="Entrer votre title" name="title" required="required" size="40"></td>
				</p>
			</tr>

			<tr>
        		<p>
        			<td><label>Photo:</label></td>
        			<td><input type="file" name="photo"></td>
       			</p>
			</tr>

			<tr>
				<p>
		 			<td><label>Prix:</label></td>
					<td><input type="text" valeur="text"placeholder="Entrer votre Prix" name="prix" required="required" size="40"></td>
				</p>
			</tr>

			<tr>
				<p>
		 			<td><label>Stock:</label></td>
					<td><input type="text" valeur="text" placeholder="Entrer votre Stock" name="stock" required="required" size="40"></td>
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

	$fileName = $_FILES['photo']['name'];
	$fileExtension = strrchr('photo', 'tmp_name');
	$file_tmp_name = $_FILES['photo']['tmp_name'];
	$fileDestination = 'media/'.$fileName;

	$recupTitle= $_POST["title"];
	$recupPhoto= $_POST["photo"];
	$recupPrix= $_POST["prix"];
	$recupStock= $_POST["stock"];
	

	$recupAlldeClient='SELECT* from prodsac where title=:titleStocks, photo=:photoStock, prix=:prixStocks, stock=:stockStocks';

	$vardataClient=$bdd->prepare($recupAlldeClient);
	$vardataClient->execute(array(
		'titleStocks' =>$recupTitle,
		'photoStock' =>$recupPhoto,
		'prixStocks' =>$recupPrix,
		'stockStocks' =>$recupStock,
	));
$count=$vardataClient->rowCount();
if($count>0)
	{
		echo "<SCRIPT type='text/javascript'>alert(' Vous etez deja notre client connectez-vous a droite de l'inscription!!');</SCRIPT>";	
	}
else
{
	$EnregistreUtilisateur= $bdd->prepare('INSERT INTO prodsac(title, photo, prix, stock)VALUES(?,?,?,?)'); //les ??? sont les contenus du titleClient,email,.. 
	$EnregistreUtilisateur->execute(array($recupTitle, $recupPhoto, $recupPrix, $recupStock
	));

header("Location: BoutiqueAjouterProdSac.php");
}
}

?>

<?php
include("include/footer.php");
?>

</div>

<style>

h1 p{
	margin-left: 600px;
	color: #444766
}
h1{
	margin-left: 400px;
	color: #444766;
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
a{
	color: #444766;
	text-decoration: none;
}
 </style>



