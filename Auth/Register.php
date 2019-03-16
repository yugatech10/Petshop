<?php include('DataBase.php') ?>
<html>
<head>
  <title>Registration</title>
  
  <link rel="stylesheet" type="text/css" href="../CSS/style.css">
</head>
<body>
 

  <div class="header">
  	<h2>Register</h2>
  </div>
	
	
	  
  <form method="post" action="Register.php">
    <?php include('errors.php'); ?>
	
	
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
	
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
	
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password">
  	</div>
	
	
	<div class="input-group">
  	  <label>Type of User</label>
  	</div>
      <input type="radio" name="type_user" value="Admin"> Admin
	  <input type="radio" name="type_user" value="Owner"> Owner<br><br>
	
	
  	 <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
	
	
  	<p>
  		Already a member? <a href="loginPage.php">Sign in</a>
  	</p>
	
	

  </form>
  
	
       
</body>
</html>