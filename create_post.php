<!DOCTYPE html>
<html>
<head>
	<title>cse480 project</title>
	<link rel="stylesheet" type="text/css" href="login.css">

<style type="text/css">

form
{

	color: white;
	margin-left: 300px;
	margin-top: 50px;
	
}

th
{
	padding-top: 10px;
}
h3
{
	color: #ffbf00;
	margin-left: 300px;

}
</style>


<?php
include_once('logsession.php');
include_once('db.php');
?> 


<h3>Fulfill the given criterias for making a post!!!</h3> 
</head>
<body>
	

<form action="" method="POST">
	<table>
		<tr>
			<th>Title</th>
			<th><input type="text" name="title"></th>
		</tr>

		<tr>
			<th>Category</th>
			<th>
			<select name="category">
				<option value="Machine Learning">Machine Learning</option>
				<option value="Programming Language">Programming Language</option>
				<option value="Data Mining">Data Mining </option>
				<option value="Artificial Intelligence">Artificial Intelligence</option>
				<option value="Operating Systems">Operating Systems</option>
				<option value="Database">Database</option>
				<option value="Query">Query</option>
			</select>
			</th>
		</tr>

		<tr>
			<th>Description</th>
			<th><textarea name="description" rows="5" cols="30" style="margin-left: 10px"></textarea>
			</th>
		</tr>

		<tr>
			<th colspan="2" style="padding-top: 30px"><input type="submit" name="submit" value="Post" style="background-color: #2c3a36; color: white; padding: 10px; font-weight: bold;">
			</th>
		</tr>

</table>
</form>




<?php 
//session_start();

	if (isset($_POST['submit'])) 
	{
		$title= $_POST['title'];
		$category = $_POST['category'];
		$description = $_POST['description'];
		$username = $_SESSION['username'];
		//echo $category;
		
		if($title && $description ==!NULL)
		{

		$sql= "INSERT into create_post (username, title, category, description) 
		VALUES ('$username', '$title', '$category', '$description')";
		

			if(mysqli_query($con, $sql))
			{
				echo '<span style="color:#ffff80; margin-left:350px;"><b>
				Successfully Posted!!!</b> </span>';
					//return true;
			}	
			else echo '<span style="color:#ffff80; margin-left:350px;">"Post size crosses max length..Try again.."</span>';	

			mysqli_close($con);
			
			 header("Location: logpost.php");
   			 exit();

		}
	
		else
		{
			echo '<span style="color:#ffff80; margin-left:350px;"><b>Please fulfil all the criteria!!!</b> </span>';
		//echo "";
		
		}

}

?>



<footer style="margin-top: 100px; color: white; text-align: center; background-color: black; padding: 0.5px">
	<p> Copyright © 2018 Blogger's Beauty. All rights reserved</p>

</body>
</html>