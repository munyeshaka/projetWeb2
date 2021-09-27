<?php
include("include/entete.php");
include("include/menu.php");
?>

<div id="responsive">
<br>
<br>

    <div id="blog">
     
        <li><a href="BlogAjouterArticle.php">Nouveau Article</a></li>
        <li><a href="BlogAjouterAuteur.php">Ajouter un Auteur</a></li>
        <li><a href="BlogListAuteur.php">Les Auteurs du blog</a></li>
   
    </div>

<br>
<br>
 
 <h2 id="internautes">Les commentaires des internautes:</h2>

<?php

$affichageBlog= $bdd->query('SELECT* from blog order by idBlog Desc limit 4');
$affichageCommentaire= $bdd->query('SELECT* from commentaire order by idCommentaire Desc limit 100');

if(isset($_GET["supp"]))
{
  $suppressionBlog= $bdd->query("DELETE from blog where idBlog='".$_GET["supp"]."'");
}


  while($dataBlog= $affichageBlog->fetch())
   {
    ?>

  <div id="rightcolumn">
    <div id="backgroundAutreBrog">
    <div id="backgroundBlogRight">
      <h2><?php echo $dataBlog["title"]?></h2>
      <h5><?php echo $dataBlog["descriptionDate"]?></h5>

      <div id="img1" >
        <?php echo '<img style="height:400px; width:400px;" src="'.$dataBlog['photo'].'">';?><br>
      </div>
          
      <div id="textee"><?php echo $dataBlog["article"]?></div>

<!--supprimer blog-->
      <h6 id="css"><a onclick="return(confirm('Voulez-vous vraiment supprimer cet enregistrement??'));" href="Blog.php?supp=<?php echo $dataBlog["idBlog"];?>">Supprimer article<a/></h6>
<!--Modifier blog -->
      <h6><a href="BlogModifier.php?Modifier=<?php echo $dataBlog["idBlog"];?>">Modifier article</a></h6>


    </div>
  </div>
</div>

<div id="leftcolumn">
    <div id="backgroundAutreBrog">
        <div id="backgroundBlogLeft">
          <?php
          while($dataCommentaire= $affichageCommentaire->fetch())
            {
            ?>
          <h4><?php echo $dataCommentaire["nom"];?> a commenté:</h4><?php echo $dataCommentaire["commentaire"];?><br>

          <?php
          }
          ?>
        </div>
    </div>
</div>


</div>
</div>
   

 <?php //fermetures des balises php d'affichage
  }
  ?>
  
<?php
//include("include/footer.php");
?>

</div>

<style>
  
body {
  font-family: Arial;
  padding: 20px;
  background: white;
}

#blog {
  color:white;
 }
 #blog a{
  color: black;
  text-decoration: none;
 }

#backgroundBlogLeft{
  background-color: white;
  padding: 20px;
  margin-top: 20px;
  width: 310px;
}
#backgroundBlogRight{
  background-color: white;
  padding: 20px;
  margin-top: 20px;
  width: 620px;
}
#backgroundAutreBrog{
   background-color: #444766;
   padding: 20px;
   margin-top: 20px;
   width: 350px; 
}

#rightcolumn {
  background-color: #444766;
  padding: 0px;
  width: 60%;
  float:right;
}
#rightcolumn a{

  text-decoration: none;
  color: black;
}
#leftcolumn{
  float: left;
  width: 20px;
}
#img1 {
  background-color: #aaa;
  padding-top: 50px;
  padding: 20px;
  margin-left: 80px;
  width: 400px;
  border-radius: 10px;
}
#leftcolumnMain{
  float: left;
  width: 20px;
}
#title{
  background-color: blue;
  float: left;
  width: 20px;
}
#textee{
  height: 193px;
  color: #444766;
  padding: 20px;
  overflow: hidden;
  word-wrap: break-word;
}

</style>
