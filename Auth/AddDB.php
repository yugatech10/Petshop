<?php
session_start();

//if session exists
if(isset ($_SESSION["username"])) //session userid gets value from text field named userid, shown in user.php
{
	$petID =$_POST["petID"];
	$petType =$_POST["petType"];
	$petGender =$_POST["petGender"];
	$petAge =$_POST["petAge"];
	$registerStatus =$_POST["registerStatus"];
	
	$link = mysqli_connect ('localhost', 'root', '', 'petshop');
	
	 if (!$link)
     {
	     die ("Could not connect: ".mysqli_connect_error());
     }
     else
     {
	     $queryInsert ="insert into pets values 
	     ('".$petID."','".$petType."','".$petGender."','".$petAge."')";
	     $resultInsert = mysqli_query($link,$queryInsert);
	
	     if(!$resultInsert)
		 {
		     die("Invalid query: ".mysqli_error($link));
	     }
	     else
		 {
		     echo "Record has been added into database.";
		     echo "<br><br>";
		     header('Refresh: 10; menuOwner.php');
		 }
     }
}
?>