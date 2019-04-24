
<?php
session_start(); // Right at the top of your script
?>
<!DOCTYPE html>
<html>
<head>
	<title>cse480 project</title>
<link rel="stylesheet" type="text/css" href="login.css">


<?php
include_once('design.php');
include_once('db.php');

?> 

<style type="text/css">

form
{
	color: white;
	margin-left: 400px;
	margin-top: 50px;
}

</style>


</head>
<body>

	<div class="log">

	<p style="margin-top: 50px; margin-bottom: 30px; font-weight: bold; color: white">Enter your E-mail and Password!!!</p>

	<form action="" method="POST">
		<table>
			<tr>
				<th>Username</th>
				<th><input type="text" name="username" ></th>
			</tr>
			<tr>
				<th>Password</th>
				<th><input type="password" name="Password"></th>
			</tr>

			<tr>
				<th colspan="2"><input type="submit" name="submit" value="Sign in" style="background-color: #2c3a36;
				color: white; padding: 10px; margin-top: 10px; margin-left: 30px; 
				font-weight: bold"> </th>
			</tr>

		</table>

	</form>

<?php

	if(isset($_POST['submit']))
	{
		$username = $_POST['username'];
		$Password = $_POST['Password'];


		$sql="select * from users where username = '$username' and Password = '$Password'";

	$result = mysqli_query($con, $sql);

	if(mysqli_num_rows($result) > 0)
	{
		//echo "login suess";
		//header("Location: index.php");
   		//exit;
		$_SESSION['logged']=true;
    	$_SESSION['username']=$username;
    	//$_SESSION['count'] = 1;
    header("Location: index2.php");
    exit();
		//delete_everything();
	}
	else
		echo '<span style="color:#ffff80; margin-left:50px;"><b>Incorrect username and Password</b> </span>';
		
}
?>



	<p style="color: white">Don't have an account? Please Sign Up!!</p>
	

	<input type="button" name="signup" value="Sign Up" 
	onclick="location.href='signup.php'" 
	style="background-color: #2c3a36; 
	color: white; padding: 10px; 
	font-weight: bold"> 

</div>

<footer style="margin-top: 100px; color: white; text-align: center; background-color: black; padding: 0.5px">
	<p> Copyright © 2018 Solvers den. All rights reserved</p></footer>

</body>
</html>