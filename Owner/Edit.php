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

     <h1 style="text-align:center;">Edit Pet Detail</h1>
<br><br>
<?php
session_start();

//if session exists
if(isset ($_SESSION["username"])) //session userid gets value from text field named userid, shown in user.php
{
$petID = $_POST["petID"];


$link = mysqli_connect ('localhost', 'root', '', 'petshop');

if (!$link)
{
	die ("Could not connect: ".mysqli_connect_error());
}
else
   {
	 $queryGet = "select * from pets where petID = '".$petID."'";
	
	 $resultGet = mysqli_query($link,$queryGet);
	
	 if(!$resultGet)
	 {
		die ("Invalid Query - get Register List: ". mysqli_error($link));
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
		             <th>Registration Status(Update By Admin)</th>
	             </tr>
	 <form action="UpdatePet.php" name="EditForm" method="POST">
	 <?php
	 
	 while($baris= mysqli_fetch_array($resultGet, MYSQLI_BOTH))
	 {
		$petID = $baris['petID'];
		$petType = $baris['petType'];
		$petgender = $baris['petgender'];
		$petAge = $baris['petAge'];
		$registerStatus = $baris['registerStatus'];
		
		 ?>
		 <tr>
			<td><?php echo $baris['petID']; ?></td>
			<td><input type="text" name="petType" value="<?php echo $baris['petType']; ?>" required></td>
			<td>
			<select name="petgender" required>
				<option value=""> - Please choose - </option>
				<option value="Male" <?php if ($petgender == "Male") echo "selected";?>> Male </option>
				<option value="Female" <?php if ($petgender == "Female") echo "selected";?>> Female </option>
			<?php echo $baris['petgender']; ?>
			</select>
			</td>
			<td><input type="number" name="petAge" min="0" step="0.5" value="<?php echo $baris['petAge'];?>" required></td>
			<td><?php echo $baris['registerStatus']; ?></td>
		</tr>
<?php
		}
?>
	</table>
	<br>
	<input type="hidden" name="petID" value="<?php echo $petID;?>">
	<button style="position: relative;left: 1250px"; type="submit" class="btn" name="Update Record">Update Record</button>
	</form>
	<?php
		}
		}
}
else {
	echo "No session exists or session has expired. Please log in again ";
	echo "Page will be redirect in 5 seconds";
	header('Refresh: 5; ../Admin/Login.php');
}
	?>

</body>
</html>