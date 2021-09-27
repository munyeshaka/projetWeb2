<?php
include("include/entete.php");
include("include/menu.php");
?>

<div id="responsive">


<?php 

$affichageCommentaire= $bdd->query('SELECT* from commentaire order by idCommentaire Desc limit 100');

if(isset($_GET["supp"]))
{
  $suppressionCommentaire= $bdd->query("DELETE from commentaire where idCommentaire='".$_GET["supp"]."'");
}

        while($dataCommentaire= $affichageCommentaire->fetch())
        {
        ?>
    <div id="commentaireDroite">
      <h2>Commentaire de <?php echo $dataCommentaire["nom"];?></h2>
      <h4><?php echo $dataCommentaire["commentaire"];?></h4>

    <!--supprimer blog-->
      <h6><a onclick="return(confirm('Voulez-vous vraiment supprimer cet enregistrement??'));" href="BlogCommentaire.php?supp=<?php echo $dataCommentaire["idCommentaire"];?>">Supprimer<a/></h6>
<!--Modifier blog -->
      <h6><a href="BlogCommentaireModifier.php?Modifier=<?php echo $dataCommentaire["idCommentaire"];?>">Modifier</a></h6>
    </div>

<?php
}
?>



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
  padding-left: 20px;
  width: 40%;
  color: white;
  margin-top: 30px;
  margin-left: 400px;
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