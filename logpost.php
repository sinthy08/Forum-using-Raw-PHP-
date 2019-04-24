<!DOCTYPE html>
<html>
<head>
	<title>cse480 project</title>
<?php
include_once('logsession.php');
include_once('db.php');
?> 

<style type="text/css">
	.tab
	{
		color: #80ff80;
		margin-left:100px;
		padding: 5px;
		padding-top: 10px;
		padding-left: 100px; 
	}

	.cat
	{
		color:#4EF0DC;
	}
	.des
	{
		padding-top: 10px;
		color: #FFBC68;
	}

	.name
	{
		font-size: 14px;
		color: #FF9ECB;
	}
	.title
	{
		font-size: 20px;
		color: #4EF0DC;
	}
</style>
</head>
<body>

<?php 
	
		$sql= "SELECT username, title, category, description, created_at
				from create_post ORDER BY post_id DESC";
		
		$result=mysqli_query($con, $sql);

		echo "<div class=tab>";
		
		if(mysqli_num_rows($result) > 0)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				
				echo "<div class=title>";
				echo "<b>Title :   " .$row["title"]. "</b><br></div>";
				
				echo "<div class=cat>";
				
				echo "<b>Category :   </b>".$row["category"]. "<br></div>";
				
				echo "<div class=des>";
				echo $row["description"]. "<br>";
				echo "</div>";          

				
				echo "<div class=name>";
				echo "<b>Posted by,  ".$row["username"]."</b><br> ";
				echo "Time :  ".$row["created_at"]. "<br></div> <br>Comments:<br>";


				?>

				<form action= "" method="POST">

				<textarea rows="5" cols="50" name= comment> </textarea> <br>
				<input type = submit name=submit value=comment><br><br>
			
				</form>	
			<?php
			 }
			echo "</div>";

			if(isset($_POST['submit']))
			{
				$username=$_SESSION['username'];
				$comment=$_POST['comment'];
				//$post_id=$_SESSION["post_id"];
				
				//echo $username;
				//echo $post_id;
			if($comment!= NULL)
			{

			$sql="INSERT into log_comment(username,body) VALUES ('$username', '$comment')";


			//$result=mysqli_query($con, $sql);

			if(mysqli_query($con, $sql))
			{
				echo '<span style="color:#ffff80; margin-left:350px;"><b>
				Successfully Posted!!!</b> </span>';
					//return true;
			}	
			else echo '<span style="color:#ffff80; margin-left:350px;">"Post size crosses max length..Try again.."</span>';	

		} else
		echo "Existing comments are shown..<br>";

			$sqli="SELECT username, body, created_at
				from log_comment ORDER BY cmnt_id DESC";

					$result=mysqli_query($con, $sqli);

		//echo "<div class=tab>";
		
		if(mysqli_num_rows($result) > 0)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				echo "<div class=tab>";
				//echo "<div class=title>";
				echo "<b>Username :   " .$row["username"]. "</b><br>";
				
				//echo "<div class=cat>";
				
				echo "<b>body :   </b>".$row["body"]. "<br>";
				
				//echo "<div class=des>";
				echo "time: " .$row["created_at"]. "<br><br></div>";
				//echo "</div>";          
			}  

		}                   
	}mysqli_close($con); 
}

	

	else
		{
			echo '<span style="color:#ffff80;"><marquee behavior="scroll" direction="left" style="margin-top: 100px; font-size: 40px;"> <b>No Posts to Show...</b></marquee> </span>';
		
		}


?>





<footer style="margin-top: 100px; color: white; text-align: center; background-color: black; padding: 0.5px">
	<p> Copyright © 2018 Solvers den. All rights reserved</p></footer>
</body>
</html>