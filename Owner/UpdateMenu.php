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
	 
	 <h1 style="text-align:center;">Update your Pet Detail</h1>
	 <h4 style="text-align:center;">Choose which record you want to edit.</h4>

<?php
//call this function to check if session exists or not
session_start();

//if session exists
if(isset ($_SESSION["username"])) //session userid gets value from text field named userid, shown in user.php
{
	$link = mysqli_connect ('localhost', 'root', '', 'petshop');
	if (!$link)
     {
	     die ("Could not connect: ".mysqli_connect_error());
     }
     else
        {
	         $queryGet = "select * from pets where username = '".$_SESSION["username"]."' order by petID";
	
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
				     <th>Choose</th>
                     <th>Pet ID</th>
		             <th>Pet Type</th>
		             <th>Pet Gender</th>
		             <th>Pet Age(years)</th>
		             <th>Registration Status</th>
	             </tr>
				 
				  <form action="Edit.php" name="EditForm" method="POST">
				 
	             <?php
                     while($row= mysqli_fetch_array($resultGet, MYSQLI_BOTH))
	                {
		         ?>
		             <tr>
					     <td><input type="radio" name="petID" value="<?php echo $row{'petID'};?>" required></td>
		                 <td><?php echo $row['petID'];?></td>
		                 <td><?php echo $row['petType'];?></td>
		                 <td><?php echo $row['petgender'];?></td>
		                 <td><?php echo $row['petAge'];?></td>
		                 <td><?php echo $row['registerStatus'];?></td>
		             </tr>
	            <?php
		            }
				?>
		         </table>
	             <br>
				 <button style="position: relative;left: 1250px"; type="submit" class="btn" name="Choose">Choose</button>
	             </form>
			<?php
		    }
		}
}		
else {
    echo "No session exists or session has expired. Please log in again ";
	echo "Page will be redirect in 5 seconds";
	header('Refresh: 5; ../Admin/Login.php');
	}?>
        
	 
	 
</body>
</html>

