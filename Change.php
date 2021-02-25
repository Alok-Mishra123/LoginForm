<?php
$host="localhost";
$user="root"; 
$password="";
$db="demo";

$con=mysqli_connect($host, $user, $password, $db);

$select = "select * from loginform";
$query = mysqli_query($con,$select);
$data = mysqli_fetch_assoc($query);
$oldpwd = $data['Pass'];
if(isset($_POST['save']))
{
	$current = $_POST['current'];
	$new = $_POST['new'];
	$confirm = $_POST['confirm'];
	if($current == $oldpwd)
	{
		if($new == $confirm)
		{
			$update = "update loginform set Pass = '$new' where ID = 1 ";
			$query = mysqli_query($con,$update);
			if($query)
			{
				echo'<script> window.location="Home.php";</script>';
			}
			else
			{
				echo "Your both password do not match";
			}
		}
	}
	else
	{
		echo "you entered wrong password";
	}
}
?>
<html>
<head>
<title> Reset Password </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="loginbox">
	<img src="Avatar.png" class="avatar">
	<h1>Reset Password</h1>
	<form method="post" action="">
		<p>Current Password</p>
		<input type="password" name="current" placeholder="Enter Password">
		<p>New password</p>
		<input type="password" name="new" placeholder="New Password">
		<p>Confirm password</p>
		<input type="password" name="confirm" placeholder="ReEnter Password">
		<input type="submit" name="save" value="Change Password">

	</form>

	</div>
</body>
</html>