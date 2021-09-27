<?php
include("include/entete.php");
include("include/menu.php");
?>

<div id="responsive">

	<div id="boutique">

<?php

$affichageProduit= $bdd->query('SELECT* from produit order by idProduit Desc limit 20');
$affichageProdBasin= $bdd->query('SELECT* from prodbasin order by idProdBasin Desc limit 20');
$affichageProdSac= $bdd->query('SELECT* from prodsac order by idProdSac Desc limit 20');
$affichageCategorie= $bdd->query('SELECT* from categorie order by idCategorie Desc limit 20');
if(isset($_GET["supp"]))
{
	$suppressionProduit= $bdd->query("DELETE from produit where idProduit='".$_GET["supp"]."'");
	$suppressionProdBasin= $bdd->query("DELETE from prodbasin where idProdBasin='".$_GET["supp"]."'");
	$suppressionProdSac= $bdd->query("DELETE from prodsac where idProdSac='".$_GET["supp"]."'");
	$suppressionCategorie= $bdd->query("DELETE from categorie where idCategorie='".$_GET["supp"]."'");
}

?>

<h1>
	<p><a id="a" href="BoutiqueAjouterProduit.php"> Ajouter Produit</a></p>
	<p><a id="a" href="BoutiqueAjouterCateg.php"> Ajouter Catégorie</a></p>
</h1>


<h1>Catégories</h1>
<div id="categorie">
<?php

	while($dataCategorie= $affichageCategorie->fetch())
	 {
	?>

	<?php echo $dataCategorie["nomCateg"];?><br>

	<?php 
	}
	?>

</div>

<div id="mainProd">
	<?php
	while($dataProdSac= $affichageProduit->fetch())
	 {
		?>
		<div id="produit">
			<div id="photoProduit">
		<tr>
			<td><?php echo $dataProdSac["title"];?></td>
        	<td><?php echo '<img style="height:200px; width:200px;" src="media/'.$dataProdSac['photo'].'">';?></td>
      		<td><?php echo $dataProdSac["prix"];?></td>
			<td><?php echo $dataProdSac["stock"];?></td>

		<td ><a onclick="return(confirm('Voulez-vous vraiment supprimer cet enregistrement??')); "id="" href="boutique.php?supp=<?php echo $dataProdSac["idProduit"];?>">Supprimer<a/></td>
</div>
</div>
		<?php
		}
		?>


	<?php
	while($dataProdBasin= $affichageProdBasin->fetch())
	 {
	?>
		<tr>
			
			<div id="produit">
			<div id="photoBasin">

			<td><?php echo $dataProdBasin["title"];?></td>
        	<td><?php echo '<img style="height:200px; width:200px;" src="media/'.$dataProdBasin['photo'].'">';?></td>
      		<td><?php echo $dataProdBasin["prix"];?></td>
			<td><?php echo $dataProdBasin["stock"];?></td>

		<td><a onclick="return(confirm('Voulez-vous vraiment supprimer cet enregistrement??')); " href="boutique.php?supp=<?php echo $dataProdBasin["idProdBasin"];?>">Supprimer<a/></td>
	</div>
	</div>
			<?php
			}
			?>


	<?php
	while($dataProdSac= $affichageProdSac->fetch())
	 {
		?>
		<div id="produit">
			<div id="photoSac">
		<tr>
			<td><?php echo $dataProdSac["title"];?></td>
        	<td><?php echo '<img style="height:200px; width:200px;" src="media/'.$dataProdSac['photo'].'">';?></td>
      		<td><?php echo $dataProdSac["prix"];?></td>
			<td><?php echo $dataProdSac["stock"];?></td>



		<td><a onclick="return(confirm('Voulez-vous vraiment supprimer cet enregistrement??')); "id="" href="boutique.php?supp=<?php echo $dataProdSac["idProdSac"];?>">Supprimer<a/></td>
	</div>
	</div>
		</tr>
	
	<?php
	}
	?>
	

</table>
</div>


<?php
include("include/footer.php");
?>

</div>

<style>

h1 p{
	margin-left: 920px;
	font-size: 15px;
}
h1{
	margin-left: 20px;
	color: #444766;
	margin-top: 10px;
}
#a{
	text-decoration: none;
	color: #444766;
	background-color: white;
}
table{
	background-color: #444766;
	color: #444766;
	padding:30px;
	margin-top: -80px;
	margin-left: 260px;
	border-radius: 10px;
}
tr{
	color: #444766;
	border-radius: 1px solid red;
	top: 30px;
}
th{
	color: #444766;
	font-size: 40px;
	padding: 10px;
}
#categorie{
	margin-left: 50px;
	color: #444766;
	font-size: 25px;
}
a{
	color: #444766;
	text-decoration: none;
	font-size: 20px;
}
td{
	font-size: 20px;
	color: #444766;
}
#mainProd{
	background-color: white;
	width: 100%;
	margin-left: 20px;
	margin-right: 5px;
	border-radius: 3px;
	padding: 10px;
	box-shadow: 6px 6px 6px silver;
}
#produit{
	display: inline-block;
}
#photoProduit{
	background: #fff;
	width: 100%;
	border: 2px solid #ccc;
	border-radius: 14px;
	box-shadow: 5px 10px 3px silver;
}
#photoBasin{
	background: #fff;
	width: 100%;
	border: 2px solid #ccc;
	border-radius: 14px;
	box-shadow: 5px 10px 3px silver;
}
#photoSac{
	background: #fff;
	width: 100%;
	border: 2px solid #ccc;
	border-radius: 14px;
	box-shadow: 5px 10px 3px silver;
}


</style>


