<?php
//call this function to check if session exists or not
session_start();

//if session exists
if(isset ($_SESSION["username"])) //session userid gets value from text field named userid, shown in user.php
{
?>
<html>
<head>
  <title>Owner Page</title>
  
  <link rel="stylesheet" type="text/css" href="../CSS/sideNavigation.css">
</head>
<body>
     <div class="sidenav">
	     <a href="Menu.php">Main Menu</a>
	     <a href="PetRegisterMenu.php">Register Pet</a>
		 <a href="UpdateMenu.php">Update Pet Detail</a>
		 <a href="DeleteMenu">Delete Pet</a>
		 <a href ="../Auth/Logout.php"<button>Logout</button></a>
	 </div>
	 
	 <div class="header">
	         <h1>Welcome Owner <?php echo $_SESSION["username"];?></h1>
     </div>
	 
	 <form action="AddPet.php" name="PetRegister" method="POST">
	     <div class="input-group">
	         Pet ID<input type="text" name="petID" required> <br><br>
		     Pet Type<input type="text" name="petType" required> <br><br>
		     Pet Gender
		         <select name="petgender" required>
		             <option value="-- Please choose --">Please choose</option>
		             <option value="Male">Male</option>
			         <option value="Female">Female</option>
		         </select> <br><br>
		     Pet Age<input type="number" placeholder="years" name="petAge" required> <br><br>
		     <input class="btn" type ="reset" value ="Reset"></button>
		     <input class="btn" type ="submit" value = "View Item Details"></button>
		 </div>
	</form>
	 

</body>
</html>

<?php
}
else {
    echo "No session exists or session has expired. Please log in again ";
	echo "Page will be redirect in 5 seconds";
	header('Refresh: 5; ../Admin/Login.php');
	}
?>
