<?php 
$host="localhost";
$user="root"; 
$password="";
$db="demo";

$con=mysqli_connect($host, $user, $password, $db);

if(isset($_POST['submit']))
{
    
    $uname=$_POST['Username'];
    $pswd=$_POST['Password'];
    
    $sql="select * from loginform where User='".$uname."'AND Pass='".$pswd."' limit 1";
    
    $result=mysqli_query($con, $sql);
    
    if(mysqli_num_rows($result)==1){
		echo'<script> window.location="Home.php";</script>';
    }
    else{
		
        echo"<script>alert('UserID and Password is Incorrect');</script>";
	
    }
        
}

?>

<html>
<head>
<title> Login Form Design </title>
	<link rel="stylesheet" type="text/css" href="style.css">
<body>
	<div class="loginbox">
	<img src="Avatar.png" class="avatar">
	<h1>Login Here</h1>
	<form method="POST" action="#">
		<p>Username</p>
		<input type="text" name="Username" placeholder="Enter Username">
		<p>Password</p>
		<input type="password" name="Password" placeholder="Enter Password">
		<input type="submit" name="submit" value="Login">
		<a href="#">Lost your password?</a><br>
		<a href="#">Don't have an account?</a>
	</form>

	</div>
</body>
</head>
</html>