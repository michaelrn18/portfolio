<?php session_start(); ?>
<html>
<head>
    <title>login</title> 
</head>
    <body>
    <div class="login-box">
        <h1>Login Here</h1>
            <form method="POST" action="login.php">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password">
            <input type="submit" name="submit" value="Login">
            <a href="registreer.php">Register</a>    
            </form>
        
			<br>
	<?php
		
		if (isset($_SESSION['message'])){
			echo $_SESSION['message'];
		}
		unset($_SESSION['message']);
	?>
        </div>
    
    </body>
</html>


