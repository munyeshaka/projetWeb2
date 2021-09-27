<?php
include("include/entete.php");
include("include/menu.php");
?>

<?php

$affichageCV= $bdd->query('SELECT* from cv order by idCv asc limit 15');
$affichageProfil= $bdd->query('SELECT* from profil order by idProfil asc limit 15');
$affichageCompetence= $bdd->query('SELECT* from competence order by idCompetence asc limit 15');
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

			<table>

			<?php
			while($dataCV= $affichageCV->fetch())
			 {
			?>
			<tr>
				<td id="anneeAutre"><?php echo $dataCV["anneeAutre"];?></td>  <!--les noms qui sont dans databse-->
			
				<td id="actionCompetence"><?php echo $dataCV["actionCompetence"];?></td>
		
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

		<table>

		<?php
		while($dataProfil= $affichageProfil->fetch())
		 {
			?>
			<tr>
				<td id="profil"><?php echo $dataProfil["profil"];?></td>  <!--les noms qui sont dans databse-->
						
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

		<table>
		<?php
		while($dataCompetence= $affichageCompetence->fetch())
		 {
		?>
			<tr>
		
				<td id="anneeAutre"><?php echo $dataCompetence["anneeAutre"];?></td>  <!--les noms qui sont dans database-->
				<td id="actionCompetence"><?php echo $dataCompetence["actionCompetence"];?></td>
				
				
			<?php
			}
			?>

		</table>
		<br>
		<br>
		</div>

		<hr>

    <dir id="sujet">
    	<h1></h1>
    	
    </dir>

    
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
	margin-top: 40px;
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
</style>