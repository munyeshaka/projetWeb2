<?php
include("include/entete.php");
include("include/menu.php");
$bdd = new PDO('mysql:host=localhost;dbname=projweb2;charset=utf8)','root','');

?>

<form METHOD="POST">
	<table>
	
			<p id="">Contenu du profil:</p>
			<textarea name="profil"></textarea>
			<p id="">Date de publication</p>
			<input type="Date" id="" name="DatePublication">

			<p><input type="submit" name="insertion" id="" value="Enregistrer profil"></td><input type="reset" name="Annuler"></p>
				</td>
			</p>
	</table>
</form>

<?php
include("include/footer.php");
?>

<?php
if(isset($_POST["insertion"]))
{
	$recupProfil= $_POST["profil"];
	$recupDatePublication= $_POST["DatePublication"];

	$recupAllprofilDB='SELECT* from profil where profil=:profilStocks && DatePublication=:DatePublicationStocks';
	$vardataProfil=$bdd->prepare($recupAllprofilDB);
	$vardataProfil->execute(array(
		'profilStocks' =>$recupProfil,
		'DatePublicationStocks' =>$recupDatePublication
	));
$count=$vardataProfil->rowCount();
if($count>0)
	{
		echo "<SCRIPT type='text/javascript'>alert(' CV Exist deja !!');</SCRIPT>";	
	}
else
{


	$insertionprofil= $bdd->prepare('INSERT INTO profil(profil, DatePublication)VALUES(:profil,:DatePublication)');
	$insertionprofil->execute(array('profil' =>$recupProfil,'DatePublication' =>$recupDatePublication));

header("Location: Accueil.php");
}
}

?>
