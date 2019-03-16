<!DOCTYPE html>
<html>
<head><title>Update Page</title></head>

<body>
<h1>Pet Detail Update</h1>
<br>
<?php

    $petID =$_POST["petID"];
	

    $link = mysqli_connect ('localhost', 'root', '', 'petshop');

if (!$link)
{
	die ("Could not connect: ".mysqli_connect_error());
}

else
{
    $queryDelete = "DELETE FROM pets WHERE petID = '".$petID."'";
	 
	 $resultDelete = mysqli_query($link,$queryDelete);
	 if (!$resultDelete)
	{
		die ("Error: ".mysqli_error($link));
	}		
	else {
		echo "Record has been delete from database.";
		echo "<br><br>";
		echo "Page will be redirect in 5 seconds";
		header('Refresh: 5; Menu.php');
	}
}
?>

</body>
</html>