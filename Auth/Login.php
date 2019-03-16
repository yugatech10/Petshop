<?php include('DataBase.php') ?>

<html>
<head>
<title> Login Page </title>
<link rel="stylesheet" type="text/css" href="../CSS/style.css"> </link>

</head>


<body >
     <div class="header">
  	      <h2>Login Here</h2>
     </div>
     <form class= "Login Form" method = "post">

	    <div class="input-group">
	        <?php include('Errors.php');
			?>
	         <input type="text" placeholder="Username" name = "username"/></br>
	         </br>
	         <input type="password" placeholder="Password" name = "password"/></br>
	         </br>
	   
  		     <button type="submit" class="btn" name="login_user">Login</button>
			 <p>Don't have an account? <a href="Register.php">Register</a> </p>
	    </div> 
	 </form>
	   

</body>


</html>








