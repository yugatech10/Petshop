<?php
session_start();

//if session exists
if(isset ($_SESSION["username"])) //session userid gets value from text field named userid, shown in user.php
{
	$petID =$_POST["petID"];
	$petType =$_POST["petType"];
	$petgender =$_POST["petgender"];
	$petAge =$_POST["petAge"];
	$registerStatus ="-";
	$username =$_SESSION["username"];
	$link = mysqli_connect ('localhost', 'root', '', 'petshop');
	
	 if (!$link)
     {
	     die ("Could not connect: ".mysqli_connect_error());
     }
     else
     {
	     $queryInsert ="insert into pets (petID , petType, petgender, petAge,registerStatus,username)values 
	     ('".$petID."','".$petType."','".$petgender."','".$petAge."','".$registerStatus."','".$username."')";
	     $resultInsert = mysqli_query($link,$queryInsert);
	
	     if(!$resultInsert)
		 {
		     die("Invalid query: ".mysqli_error($link));
	     }
	     else
		 {
		     echo "Record has been added into database.";
		     echo "<br><br>";
			 echo "Page will be redirect in 5 seconds";
		     header('Refresh: 5; Menu.php');
		 }
     }
}
else
	{
	header('location: loginPage.php');
}
?>
