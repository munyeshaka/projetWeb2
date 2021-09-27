<?php
include("include/entete.php");
include("include/menu.php");

$affichageBlog= $bdd->query("SELECT* from blog where idBlog='".$_GET["Modifier"]."'");
$dataBlog= $affichageBlog->fetch();

?>

<div id="responsive">
<form METHOD="POST">
<fieldset>
	<h1>Modifier un Blog</h1>
	<table>


		<tr>
			<td>Title du Blog:</td>
			<td><textarea name="title" size="35" required="required"/>
			<?php echo $dataBlog["title"];?>
			</textarea></td>
		</tr>

		<tr>
			<td>Description/Auteur/Date du Blog:</td>
			<td><textarea name="descriptionDate" size="35" required="required"/>
			<?php echo $dataBlog["descriptionDate"];?>
			</textarea></td>
		</tr>

		<tr>
			<td>Article:</td>
			<td><textarea name="article" size="35" required="required"/>
			<?php echo $dataBlog["article"];?>
			</textarea></td>
		</tr>

		<tr>
			<td></td>
			<td><input type="submit" value="modifier" name="modifier"></td>
			<td><input type="reset" value="Annuler"></td>
		</tr>


	</table>
</fieldset>
</form>

<?php
if(isset($_POST["modifier"]))
{
	$recuptitle= $_POST["title"];
	$recupdescriptionDate= $_POST["descriptionDate"];
	$recuparticle= $_POST["article"];

	$modifiertitle= $bdd->EXEC("UPDATE blog set title='".$recuptitle."' where idBlog='".$_GET["Modifier"]."'");
	$modifierdescriptionDate= $bdd->EXEC("UPDATE blog set descriptionDate='".$recupdescriptionDate."' where idBlog='".$_GET["Modifier"]."'");
	$modifierarticle= $bdd->EXEC("UPDATE blog set article='".$recuparticle."' where idBlog='".$_GET["Modifier"]."'");


header("Location: Blog.php");
}

?>

<style>
fieldset {
	position: absolute;
	border-radius: 20px;
	margin-left: 160px;
	top: 200px;
	color: white;
	height: 670px;
	background-color: #444766;
	padding:120px;	
}

textarea{
	height: 55px;
	width: 250px;
	margin: 50px;
	border-radius: 10px;
}
td{
	color: white;
}
</style>