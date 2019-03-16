<!DOCTYPE html>
<html>
<head>
    <title>Pet Registration System</title>
	<link rel="stylesheet" type="text/css" href="../CSS/sideNavigation.css">
</head>

<body>
     <div class="sidenav">
	     <a href="Menu.php">Menu Pet</a>
		 <a href="UpdateMenu.php">Update Pet Detail</a>
		 <a href ="../Auth/Logout.php"<button>Logout</button></a>
	 </div>
	 <h1 style="text-align:center;">All Pet Detail</h1>
	 <h3 style="text-align:center;">Choose Pet that wanted approve:</h1>
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
				 	 <th>Username</th>
                     <th>Pet ID</th>
		             <th>Pet Type</th>
		             <th>Pet Gender</th>
		             <th>Pet Age(years)</th>
		             <th>Registration Status(Update By Admin)</th>
	             </tr>
	 <form action="Update.php" name="EditForm" method="POST">
	 <?php
	 
	 while($baris= mysqli_fetch_array($resultGet, MYSQLI_BOTH))
	 {
		$username = $baris['username'];
		$petID = $baris['petID'];
		$petType = $baris['petType'];
		$petgender = $baris['petgender'];
		$petAge = $baris['petAge'];
		$registerStatus = $baris['registerStatus'];
		
		 ?>
		 <tr>
		    <td><?php echo $baris['username']?></td>
			<td><?php echo $baris['petID'];?></td>
		    <td><?php echo $baris['petType'];?></td>
			<td><?php echo $baris['petgender'];?></td>
			<td><?php echo $baris['petAge'];?></td>
			<td>
			    <select name="registerStatus" required>
				<option value=""> - Please choose - </option>
				<option value="Approved" <?php if ($registerStatus == "Approved") echo "selected";?>> Approved </option>
				<option value="Incomplete" <?php if ($registerStatus == "Incomplete") echo "selected";?>> Incomplete </option>
				<?php echo $baris['registerStatus']; ?>
				</select>
			</td>
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
	header('Refresh: 5; ../Admin/Login.php');}
	?>

</body>
</html>