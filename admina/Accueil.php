<?php
include("include/entete.php");
include("include/menu.php");
?>

<?php

$affichageCV= $bdd->query('SELECT* from cv order by idCv asc limit 15');
$affichageProfil= $bdd->query('SELECT* from profil order by idProfil asc limit 15');
$affichageCompetence= $bdd->query('SELECT* from competence order by idCompetence asc limit 15');

if(isset($_GET["supp"]))
{
	$suppressionCV= $bdd->query("DELETE from cv where idCv='".$_GET["supp"]."'");
	$suppressionProfil= $bdd->query("DELETE from profil where idProfil='".$_GET["supp"]."'");
	$suppressionCompetence= $bdd->query("DELETE from competence where idCompetence='".$_GET["supp"]."'");
}

?>

<div id="responsive">

<div id="cv">

	<div id="sujet">
		<div id="ppName">
			<p><img src="media/imgPP.png" alt="photo profil" >
			<h2>MUNYESHAKA  Aimable</h2></p>
		</div>
		<br>
		<br>
		<br>

		<h1>Détails</h1>
		<td><a id="aa" href="cvAjouter.php">Ajouter</a></td>

		<table>

		<?php
		while($dataCV= $affichageCV->fetch())
	 	{
		?>
		<tr>
			<td id="anneeAutre"><?php echo $dataCV["anneeAutre"];?></td>  <!--les noms qui sont dans database-->
			<td id="actionCompetence"><?php echo $dataCV["actionCompetence"];?></td>

			<td><a id="aa" href="cvModifier.php?Modifier=<?php echo $dataCV["idCv"];?>">Modifier</a></td>
			<td><a id="aa" onclick="return(confirm('Voulez-vous vraiment supprimer cet element du CV??')); "id="" href="Accueil.php?supp=<?php echo $dataCV["idCv"];?>">Supprimer<a/></td>
		</tr>
		<?php
		}
		?>

		</table>
	</div>

<br>
<hr>

	<div id="sujet">
		<h1>Profil</h1>
		<td><a id="aa" href="cvAjouterProfil.php">Ajouter</a></td>

		<table>

		<?php
		while($dataProfil= $affichageProfil->fetch())
	 	{
		?>
		<tr>
			<td id="profil"><?php echo $dataProfil["profil"];?></td>

			<td><a id="aa" href="cvModifierProfil.php?Modifier=<?php echo $dataProfil["idProfil"];?>">Modifier</a></td>
			<td><a id="aa" onclick="return(confirm('Voulez-vous vraiment supprimer  cet Profil??')); "id="" href="Accueil.php?supp=<?php echo $dataProfil["idProfil"];?>">Supprimer<a/></td>

		</tr>

		<?php
		}
		?>

		</table>
		</div>
<br>
<hr>

	<div id="sujet">
		<h1>Competence en informatique</h1>
		<td><a id="aa" href="cvCompetence.php">Ajouter</a></td>

		<table>
		<?php
		while($dataCompetence= $affichageCompetence->fetch())
		 {
		?>
			<tr>
		
				<td id="anneeAutre"><?php echo $dataCompetence["anneeAutre"];?></td>  <!--les noms qui sont dans database-->
				<td id="actionCompetence"><?php echo $dataCompetence["actionCompetence"];?></td>
				
				<td><a id="aa" href="cvModifierComp.php?Modifier=<?php echo $dataCompetence["idCompetence"];?>">Modifier</a></td>
				<td><a id="aa" onclick="return(confirm('Voulez-vous vraiment supprimer cet element du Competence??')); "id="" href="Accueil.php?supp=<?php echo $dataCompetence["idCompetence"];?>">Supprimer<a/></td>
			</tr>
			<?php
			}
			?>
		
		</table>
		<br>
		<br>
		</div>

</div>

<?php
include("include/footer.php");
?>

</div>

<style>
#cv{
	background: #c3d4e3;
	width: 900px;
	padding-top: 2px;
	margin-top: 30px;
	margin-left: 220px;
	border-radius: 10px;
}
#ppName img{
	border-radius: 20px;
	margin-top:60px;
	margin-left: 130px;
	width: 160px;
	height: 160px;
}
#ppName h2{
	margin-top:-110px;
	padding-left: 120px;
	margin-left: 250px;
	color: #444766;
}

hr{
	width: 800px;
}
#sujet h1{
	padding-left: 120px;
	color: #444766;
}

#anneeAutre{
	margin: 40px;
	padding-left: 120px;
	color: black;
}
#actionCompetence{
	left: 40px;
	padding-left: 180px;
	color: black;
}
#responsive{
	width: 100%;
	margin: 0 auto;
}
#profil{
	padding-left: 120px;
	color: black;
	padding-right: 100px;
}
#aa{
	color: blue;
	padding-right: 1px;
	text-decoration: none;
	padding: 25px;
}
#aa a:visited,a:focus{
	background-color: #c3d4e3;

</style>