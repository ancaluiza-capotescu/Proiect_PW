<html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']))
{
	include "login.php";
	$conn = new mysqli($servername, $username, $password, $dbname,"3360");

	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}
	else
	{
		$nume = ($_POST["nume"]);
		$prenume = ($_POST["prenume"]);
		$firma = ($_POST["firma"]);
		$adr = ($_POST["adr"]);
		$tel =($_POST["tel"]);
		$tip_f = ($_POST["tip_f"]);
		$desc = ($_POST["desc"]);

		$sql="INSERT INTO CASEM_Contact (Nume,Prenume,Firma,Adresa,Telefon,Frigider,Descriere) VALUES('$nume','$prenume','$firma','$adr','$tel','$tip_f','$desc')";
		if($conn->query($sql)===TRUE)
		{
			echo "Datele au fost introduse";
		}
		else
		{
			echo "error: ".$sql."<br>".$conn->error;
		}
	}
	$conn->close();
}
?>

</html>
