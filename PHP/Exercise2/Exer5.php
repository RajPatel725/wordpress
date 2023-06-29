<?php
if(!isset($_COOKIE["RANDOM_NUM"]))
{
	header('Location: Exer5.php');
	$randomNumber=rand(1,10);
	setcookie("RANDOM_NUM",$randomNumber);
	setcookie("submit","0");
}
echo $_COOKIE["RANDOM_NUM"];
if (isset($_POST['submit'])) 
{
	$num=$_POST['value'];
	if(isset($_COOKIE['submit']))
	{
		setcookie("submit",$_COOKIE['submit']+1);
	}
	if($_COOKIE['submit']==4)
	{
		setcookie("RANDOM_NUM","",time()-0);
		echo "<script>window.location.href='../Exercise2/';alert('Game Over');</script>";
	}
	if ($_COOKIE['RANDOM_NUM']<$num) 
	{
		echo "Thier is a biggest Number than Number you entered";
	}
	if ($_COOKIE['RANDOM_NUM']>$num) 
	{
		echo "Thier is a small Number than Number you entered";
	}
	if($_COOKIE['RANDOM_NUM']==$num)
	{
		echo "<script>window.location.href='../Exercise2/';alert('Number Is Right You Are the WiNNER')</script>";
		setcookie("RANDOM_NUM","",time()-0);
	}	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST">
		<input type="Number" name="value">
		<input type="submit" name="submit" value="NEXT">
	</form>
</body>
</html>