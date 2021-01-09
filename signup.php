<!DOCTYPE html>
<html>
<head>
	<title>cse480 project</title>
<?php
include_once('design.php');
include_once('db.php');
?> 

</head>
<body>

<?php

$unameErr = $EmailErr = $genderErr = $dobErr = $PasswordErr = $res = $usernameErr="";
$uname = $Email = $gender = $Password = $dob = $d = $username = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	//username
	
	if (empty($_POST["uname"])) 
	    $unameErr = "* Name is required";
	else 
	{
	  $uname = test_input($_POST["uname"]);
	  	if (!preg_match('/^[A-Z][a-z]+\s[A-Z][a-z]+$/',$uname)) 
	    $unameErr = "* Only letters with space allowed (first letter capital of names)";
    	else
    		$uname = $_POST["uname"];
    }
	


	if (empty($_POST["username"])) 
	    $usernameErr = "* User Name is required";
	else 
	{
	  $username = test_input($_POST["username"]);
	  	if (!preg_match('/^[A-Za-z0-9]+$/',$username)) 
	    $usernameErr = "*Username should be One Word";
		else
			$username= $_POST["username"];
    }
	    //password
	
	if (empty($_POST["Password"])) 
	    $PasswordErr = "* Password is required";
	else 
	{
	   if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,30}$/', $_POST["Password"]))
		$PasswordErr="* Password must contain 1 capital letter, 1 number and 1 sign";
		else 
			$Password=$_POST["Password"];
	}


	//E-mail

	if (empty($_POST["Email"])) 
	    $EmailErr = "* Email is required";
	else 
	{
	   if(!preg_match('/^[a-z\d\._-]+@([a-z\d-]+\.)+[a-z]{2,6}$/i', $_POST["Email"]))
		$EmailErr="* Enter a valid E-mail Address";
		else 
			$Email=$_POST["Email"];
	}



	//gender

	if (empty($_POST["gender"]))
	    $genderErr = "* Gender is required";
	else
	    $gender = test_input($_POST["gender"]);

  
	
	//Date of birth
  
	if (empty($_POST["dob"])) 
	    $dobErr = "* date of birth is required";
	else 
	 	{
	 	$d= age_validation($_POST["dob"]);

		if ($d < 18)	
			$dobErr= "* Age at least 18 to register";
		else
			$dob = $_POST["dob"];
		}

}


function age_validation($dob)
{
	$today = date("Y-m-d");
	$diff = date_diff(date_create($dob), date_create($today));
	$d = $diff->format('%y');
	return $d;
}

function test_input($data) 
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>

	
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	<!--action: error messages on the same page as the form -->
	<table style="margin-left: 300px; margin-top: 40px; color: white; text-align: left;">
		<tr>
			<th colspan="2" style="color: red"><h3><i> * Field is required </i></h3></th>
		</tr>

		<tr>
			<th>Name *</th>
			<th> <input type="text" name="uname" value="<?php echo $uname;?>" minlength=6 maxlength= 15> </th>
			<th><span class="error"><?php echo $unameErr;?></span></th>

		</tr>

		<tr>
			<th>Username *</th>
			<th> <input type="text" name="username" value="<?php echo $username;?>" minlength=6 maxlength= 15> </th>
			<th><span class="error"><?php echo $usernameErr;?></span></th>

		</tr>

		<tr>
			<th>Email *</th>
			<th><input type="text" name="Email" value="<?php echo $Email;?>"></th>
  			<th><span class="error"><?php echo $EmailErr;?></span></th>
		</tr>
		
		<tr>
			<th>Password *</th>
			<th><input type="Password" name="Password" value="<?php echo $Password;?>" minlength= 6 ></th>
  			<th><span class="error"><?php echo $PasswordErr;?></span></th>
		</tr>
		
		

		<tr>
			<th>Date of Birth *</th>

			<th style="padding-right: 0px; padding-left: 0px; margin-left: 0px; margin-right: 0px"><input type="datetime-local" name="dob" onchange="console.log(this.value.split('T')[0]);" value="<?php echo $dob;?>"></th>
  			<th><span class="error"><?php echo $dobErr;?></span></th>
		</tr>
		

		<tr>
			<th>Gender *</th>
			<th><input type="radio" name="gender" value="M">Male  
			<input type="radio" name="gender" value="F">Female
			<input type="radio" name="gender" value="O">Other </th>
			<th><span class="error"><?php echo $genderErr;?></span></th>
		</tr>
		

	
		<tr>
			<th colspan="2"><input type="Submit" name="submit" value="Sign Up" style="background-color: #2c3a36; color: white; margin-top: 40px; margin-bottom: 30px; padding: 10px; font-weight: bold; text-align: center; margin-left: 120px"></th>
		</tr>

	</table>
</form>



<?php 

		if($uname && $username && $Password && $Email && $dob && $gender ==!NULL)
		{
				
		$sql= "INSERT into users (uname, username, Email, Password, dob, gender) 
		VALUES ('$uname','$username', '$Email', '$Password', '$dob', '$gender')";
		


		if(mysqli_query($con, $sql))
		{
		//echo '<span style="color:#ffff80; margin-left:300px;"><b>Sign up successful...Please log in now...</b> </span>';
			//return true;
		
	
			
    		header("Location: signres.php");
    		
		}		

		mysqli_close($con);

			}
		else
		{
			echo '<span style="color:#ffff80; margin-left:300px; font-size: 25px;"><b>Please fulfil all the criteria!!!</b></span>';
				echo "<br>";
			echo '<span style="color:#ffff80; margin-left:350px;">(Date of Birth Time is Optional) </span>';
		//echo "";
		
		}

?>



<footer style="margin-top: 100px; color: white; text-align: center; background-color: black; padding: 0.5px">
	<p> Copyright © 2018 Solver's den. All rights reserved</p></footer>
</body>
</html>
