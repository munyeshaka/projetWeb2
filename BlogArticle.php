<?php
include("include/entete.php");
include("include/menu.php");
?>

<div id="responsive">

<?php

	$affichageBlo= $bdd->query("SELECT* from blog where idBlog='".$_GET["article"]."'");

  while($dataBloge= $affichageBlo->fetch())
   {
    ?>
  
  <div id="rightcolumn">
    <div id="backgroundBlog">
        <h2><?php echo $dataBloge["title"]?></h2>
        <h5><?php echo $dataBloge["descriptionDate"]?></h5>

      <p><div id="img1" >
        <?php echo '<img style="height:400px; width:400px;" src="'.$dataBloge['photo'].'">';?><br>
      </div>

<br>
<br>
          <div id="textee"><?php echo $dataBloge["article"]?></div></p>

      </div>
  </div>
  <?php
	}
	?>

<h1>Commenter l'article</h1>

	<div id="Commentaire">

	<form METHOD="POST">
	<table>
	
		<tr>
			<td><label>Nom:</label></td>
			<td id=""><input type="text" pattern="[A-Z][a-z]{2,}" placeholder="Entrer votre Nom" name="nom" required="required" size="57"></td>
		</tr>

		<tr>
			<td><label>Commentaire:</label></td>
			<td><textarea name="commentaire"></textarea></td>
		</tr>

		<tr>
			<p>
				<th></th>
				<td id="submit"><input type="submit" name="EnregistreCommentaire" value="Commenter"></td>

			</p>
		</tr>

		</table>
		</form>
		</div>


<?php
if(isset($_POST["EnregistreCommentaire"]))
{
	$recupNom= $_POST['nom'];
	$recupCommentaire= $_POST['commentaire'];

	$recupCommentaireBD='SELECT* from commentaire where nom=:nomStocks, commentaire=:commentaireStocks';
	$vardataCommentaire=$bdd->prepare($recupCommentaireBD);
	$vardataCommentaire->execute(array(

		'nomStocks' =>$recupNom,
		'commentaireStocks' =>$recupCommentaire
	));

$count=$vardataCommentaire->rowCount();
if($count>0)
	{
		echo "<SCRIPT type='text/javascript'>alert(' Commentaire Exist deja !!');</SCRIPT>";	
	}
else
{
	$EnregistreCommentaire= $bdd->prepare('INSERT INTO Commentaire(nom, commentaire)VALUES(?,?)'); //contenu du nom,mot de passe, commentaire
	$EnregistreCommentaire->execute(array($recupNom,$recupCommentaire));
header("Location: BlogMonCommentaire.php");
}
}

?>



<?php
include("include/footer.php");
?>

</div>


<style>


#submit{
	color: white;
	padding:10px;
	font-size: 20px;
}
textarea{
	width: 400px;
	height: 100
}
#commentaireDroite{
  float:right;
  padding-left: 20px;
  width: 40%;
  color: white;
  margin-top: 30px;
  background-color: #444766;
  border-radius: 20px;
  margin-right: 30px;
  height: 180px;
}
a{
	color: red;
	text-decoration: none;
}

</style>