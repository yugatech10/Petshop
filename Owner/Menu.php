<!DOCTYPE html>
<html>
<head>
  <title>Pet Registration System</title>
  
  <link rel="stylesheet" type="text/css" href="../CSS/sideNavigation.css">
</head>

<body>
     <div class="sidenav">
	     <a href="Menu.php">Main Menu</a>
	     <a href="PetRegisterMenu.php">Register Pet</a>
		 <a href="UpdateMenu.php">Update Pet Detail</a>
		 <a href="DeleteMenu.php">Delete Pet</a>
		 <a href ="../Auth/Logout.php"<button>Logout</button></a>
	 </div>
	 <h1 style="text-align:center;">All Pet Detail</h1>


<?php

session_start();

//if session exists
if(isset ($_SESSION["username"])) //call this function to check if session exists or not
{
	$link = mysqli_connect ('localhost', 'root', '', 'petshop');
	if (!$link)
     {
	     die ("Could not connect: ".mysqli_connect_error());
     }
     else
        {
	         $queryGet = "select * from pets where username = '".$_SESSION["username"]."' order by petID ";
	
	         $resultGet = mysqli_query($link,$queryGet);
	
	         if(!$resultGet)
	         {
		         die ("Invalid Query - get Items List: ". mysqli_error($link));
	         }
	         else
	        {
                 ?>
                 <table id="pet" align="center">
                 <tr>
                     <th>Pet ID</th>
		             <th>Pet Type</th>
		             <th>Pet Gender</th>
		             <th>Pet Age(years)</th>
		             <th>Registration Status</th>
	             </tr>
				 <center><h3>
				 Owner <?php echo $_SESSION["username"]?>
				 </h3></center>
	             <?php
                     while($row= mysqli_fetch_array($resultGet, MYSQLI_BOTH))
	                {
		         ?>
		             <tr>
		                 <td><?php echo $row['petID'];?></td>
		                 <td><?php echo $row['petType'];?></td>
		                 <td><?php echo $row['petgender'];?></td>
		                 <td><?php echo $row['petAge'];?></td>
		                 <td><?php echo $row['registerStatus'];?></td>
		             </tr>
	            <?php
		            }
				?>
			<?php
		    }
		}
}
else{
    echo "No session exists or session has expired. Please log in again ";
	echo "Page will be redirect in 5 seconds";
	header('Refresh: 5; ../Admin/Login.php');
}				
?>
 
	 
</body>
</html>
