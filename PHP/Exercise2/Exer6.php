<?php
$con=mysqli_connect("localhost","root","","Exercise1");
if(mysqli_connect_error($con))
{
	die("Connection faild");
}
else
{
	if(isset($_POST['submit']))
	{
		$username=$_POST['UserName'];
		$password=$_POST['Password'];
		mysqli_query("insert into exer1 values('$username','password')");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form>
	User Name<input type="text" name="UserName">
	Password<input type="Password" name="Password">
	<input type="suubmit" name="">
</form>
</body>
</html>