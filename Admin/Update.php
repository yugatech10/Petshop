<!DOCTYPE html>
<html>
<head><title>Update Page</title></head>

<body>
<h1>Pet Detail Update</h1>
<br>
<?php

    $petID =$_POST["petID"];
	
	$registerStatus =$_POST["registerStatus"];

    $link = mysqli_connect ('localhost', 'root', '', 'petshop');

if (!$link)
{
	die ("Could not connect: ".mysqli_connect_error());
}

else
{
     $queryInsert = "UPDATE pets SET 
	 registerStatus = '".$registerStatus."' 
	 WHERE petID = '".$petID."'";
	 
	 $resultInsert = mysqli_query($link,$queryInsert);
	 if (!$resultInsert)
	{
		die ("Error: ".mysqli_error($link));
	}		
	else {
		echo "Record has been added into database.";
		echo "<br><br>";
	    echo "Page will be redirect in 5 seconds";
		header('Refresh: 5; Menu.php');
	}
}

?>

</body>
</html>