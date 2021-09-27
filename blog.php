<?php
include("include/entete.php");
include("include/menu.php");
?>

<body>
<div id="responsive">

<?php

$affichageBlog= $bdd->query('SELECT* from blog order by idBlog Desc');

  
  while($dataBlog= $affichageBlog->fetch())
   {
    ?>
  
  <div id="rightcolumn">
    <div id="backgroundBlog">
        <h2><?php echo $dataBlog["title"]?></h2>
        <h5><?php echo $dataBlog["descriptionDate"]?></h5>

      <div id="img1" >
        <?php echo '<img style="height:400px; width:400px;" src="'.$dataBlog['photo'].'">';?><br>
      </div>

<br>
          <div id="textee"><a href="BlogArticle.php?article=<?php echo $dataBlog['idBlog'];?>"><?php echo $dataBlog["article"]?></a></div>
            <br>
            <br>
            <a href="BlogArticle.php?article=<?php echo $dataBlog['idBlog'];?>"><?php echo "Commenter";?></a>

      </div>
  

 <?php //fermetures des balises php d'affichage
  }
  ?>

</div>

</div>
</body>




<style>
  
body {
  font-family: Arial;
  padding: 20px;
  background: white;
}
#backgroundBlog{
  background-color: #c3d4e3;
  padding: 20px;
  margin-top: 20px;
  width: 750px;
  border-radius: 6px;

}

#rightcolumn {
  padding: 10px;
  width: 70%;
}

#commentaire a{
  color: black;
}
#img1 {
  background-color: #aaa;
  padding-top: 50px;
  padding: 20px;
  margin-left: 80px;
  width: 400px;
  border-radius: 10px;
}
a{
  text-decoration: none;
}
#textee{
  height: 193px;
  color: #444766;
  padding: 20px;
  overflow: hidden;
  word-wrap: break-word;
}

</style>
