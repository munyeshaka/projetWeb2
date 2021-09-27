
<?php

include("include/entete.php");
include("include/menu.php");

?>

<div id="responsive">

<div id="up">

<?php

$affichageProduit= $bdd->query('SELECT* from produit order by idProduit Desc limit 20');
$affichageProdBasin= $bdd->query('SELECT* from prodbasin order by idProdBasin Desc limit 20');
$affichageProdSac= $bdd->query('SELECT* from prodsac order by idProdSac Desc limit 20');
$affichageCategorie= $bdd->query('SELECT* from categorie order by idCategorie Desc limit 20');

?>

<h1>Catégories</h1>
<?php

	while($dataCategorie= $affichageCategorie->fetch())
	 {
	?>

	<?php echo $dataCategorie["nomCateg"];?><br>

	<?php 
	}
	?>


<div id="mainProd">

<h1>Les Produits</h1>

	<?php
	while($dataProduit= $affichageProduit->fetch())
	 {
		?>
		<div id="produit">
			<div id="photoProduit">
		<tr>
        		<td><a href="BoutiqueBuyProd.php?buy=<?php echo $dataProduit['idProduit'];?>"><?php echo '<img style="height:200px; width:200px;" src="media/'.$dataProduit['photo'].'">';?></a></td>
      			<td id="aaa"><a href="BoutiqueBuyProd.php?buy=<?php echo $dataProduit['idProduit'];?>"><?php echo $dataProduit["prix"];?></a></td>
      	</tr>
      	
      	</div>
      	<br>
      </div>
		<?php
		}
		?>


	<?php
	while($dataProdBasin= $affichageProdBasin->fetch())
	 {
	?>
		<div id="produit">
			<div id="photoBasin">
			<tr>
        		<td><a href="BoutiqueBuyProdBasin.php?buy=<?php echo $dataProdBasin['idProdBasin'];?>"><?php echo '<img style="height:200px; width:200px;" src="media/'.$dataProdBasin['photo'].'">';?></a></td>
      			<td id="aaa"><a href="BoutiqueBuyProdBasin.php?buy=<?php echo $dataProdBasin['idProdBasin'];?>"><?php echo $dataProdBasin["prix"];?></a></td>
      			</tr>
      		
      			</div>
      			<br>
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
        	<td><a href="BoutiqueBuyProdSac.php?buy=<?php echo $dataProdSac['idProdSac'];?>"><?php echo '<img style="height:200px; width:200px;" src="media/'.$dataProdSac['photo'].'">';?></a></td>
      		<td id="aaa"><a href="BoutiqueBuyProdSac.php?buy=<?php echo $dataProdSac['idProdSac'];?>"><?php echo $dataProdSac["prix"];?></a></td>
		</tr>
		
			</div>
			<br>
		</div>
	<?php
	}
	?>
</div>



	<?php 
	if(isset($_POST['motCle']))
	{
		$motCle =$_POST['motCle'];
		$req="SELECT * from produit where title like '%$motCle%'";
	}

	?>

</table>



<?php
include("include/footer.php");
?>

</div>

<style>
#up{
	width: 100%;
	height: 40px;
}
h1 p{
	margin-left: 920px;
	font-size: 15px;
}
h1{
	margin-left: 20px;
	color: #444766;
	margin-top: 10px;
}
#aaa{
	text-decoration: none;
	color: #444766;
	background-color: white;
	font-size: 15px;

}
table{
	background-color: #444766;
	color: white;
	padding:1px;
	width: 200px;
	margin-left: 860px;
	border-radius: 10px;
}
tr{
	color: white;
	border-radius: 1px solid red;
	top: 30px;
}
th{
	color: white;
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
	font-size: 40px;
	margin-top: 20px;
}
td a{
	font-size: 20px;
}
#mainProd{
	background-color: white;
	width: 100%;
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

