<?php
include("include/entete.php");
include("include/menu.php");
?>


<div>
<form method="POST" enctype="multipart/form-data"> 
	<fieldset>
	<h1>Publier un Blog</h1>
	<form method="POST">
        
        	<p>Fichier : <input type="file" name="Fileee"></p>
					
			<p id="">Title:</p>
			<textarea name="title"></textarea>

			<p id="">descriptionDate:</p>
			<textarea name="descriptionDate"></textarea>

			<p id="">Article:</p>
			<textarea name="article"></textarea>

			<p><input type="submit" name="ajouterBlog" id="" value="Enregistrer"></td><input type="reset" name="Annuler"></p>
				</td>
			</p>
		</tr>

</fieldset>
</form>
</div>

<?php
include("include/footer.php");
?>

<?php
if(isset($_POST["ajouterBlog"]))
{
	
	$fileName = $_FILES['Fileee']['name'];
	$fileExtension = strrchr('Fileee', 'tmp_name');
	$file_tmp_name = $_FILES['Fileee']['tmp_name'];
	$fileDestination = 'media/'.$fileName;
	
	$recupTitle= $_POST["title"];
	$recupdescriptionDate= $_POST["descriptionDate"];
	$recupArticle= $_POST["article"];

 
if(move_uploaded_file($file_tmp_name, $fileDestination)){

	$insertionBlog= $bdd->prepare('INSERT INTO blog(title, descriptionDate, photo, article)VALUES(:title,:descriptionDate,:photo,:article)');
	$insertionBlog->execute(array('title' =>$recupTitle,'descriptionDate' =>$recupdescriptionDate,'photo' =>$fileDestination,'article'=>$recupArticle));
header("Location:blog.php");

}
}
?>


<style>

p a{
text-decoration: none;
color: black;
}
strong{
	color: blue;
}

</style>