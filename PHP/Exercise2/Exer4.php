<?php
session_start();
if(!isset($_SESSION['RANDOM_NUM']))
{
	$randomNumber=rand(1,100);
	$_SESSION['RANDOM_NUM']=$randomNumber;
		
}
if(isset($_GET['submit']))
{
	$number=$_GET['Number'];
	if(isset($_SESSION['count']))
	{
		$_SESSION['count'] = $_SESSION['count']+1;
	}
	else
	{
		$_SESSION['count']=1;
	}
	if($_SESSION['count']==5)
	{
		echo "<script>window.location.href='../Exercise2/';alert('Game Over')</script>";
		session_destroy();
	}
	if($_SESSION['RANDOM_NUM']<$number)
	{
		echo "Their is a bigger number than number you entered";
	}
	if($_SESSION['RANDOM_NUM']>$number)
	{
		echo "Their is a small number than number you entered";
	}
	if($_SESSION['RANDOM_NUM']==$number)
	{
		echo "<script>window.location.href='../Exercise2/';alert('Entered Number is Right You are WINER')</script>";
		session_destroy();
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<title></title>
</head>
<body>
	<div id="result">
		<input type="number" id="no">
		<input type="button" id="submit" value="NEXT">
	</div>
</body>
<script>
	$(document).ready(function(){
		$("#submit").click(function(){
			$.ajax({
				type: "GET",
				url: "Exer4.php?",
				data: {submit: $("#submit").val(), Number: $("#no").val()},
				}).done(function(data){
					$("#result").html(data);
			});
		});
	});
</script>
</html>