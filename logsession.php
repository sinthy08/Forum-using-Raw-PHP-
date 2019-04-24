<!DOCTYPE html>
<html>
<head>
	<title>design page for all</title>
	<link rel="stylesheet" type="text/css" href="style.css">
<style>

.dropdown {
  float: right;
  overflow: hidden;
  color: white;
  margin: 0px;
  padding-left:20px;
  padding-right: 20px;
}

.dropdown:hover {
  background-color: #001a00;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;

}

.dropdown-content a {
  float: none;
  color: black;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #1a0000;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
<h1>Solvers Den</h1>

<div class="topnav" align="center">
  <a class="active" href="index2.php">Home</a>
  <a href="logpost.php">Posts</a>
  <a href="create_post.php">Create Post</a>
  <a href="logcontact.php">Contact</a>
  <a href="logabout.php" style="margin-right: 180px">About</a>


<?php
session_start();
$name= $_SESSION['username'];
?>
 <div class="dropdown">
    <?php echo $name ?>
    
    <div class="dropdown-content">
      <a href="mypost.php">My Posts</a>
      <a href="signout.php">Sign out</a>
  </div> 
 
</div>


</div> 
</head>

<body style="background-image: url(red.jpg);">

</body>
</html>