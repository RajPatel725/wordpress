<?php
	session_start();
	$raNdno=rand(1,100);
	define('NUMBER', $raNdno);
	$_SESSOION['id']=NUMBER;
	echo NUMBER;
	if(!$_SESSOION['submit'])
	{
		$nuM=1;
	}
	else
	{
		
	}
	if (isset($_POST['submit'])) {
		$nUm=$_POST['num'];
      	if(!($_SESSION['submit']))
      	{
      	    $_SESSION['submit'] = 1;
      	    echo "<script>alert('Number is Right')</script>";
      	}
      	else
        {
            $coUnt = $_SESSION['submit'] + 1;
            $_SESSION['submit'] = $coUnt;
			if ($nUm==$_REQUEST['id']) 
			{
				echo "<script>alert('Number is Right')</script>";
			}
			else
			{
				echo "<script>alert('Game Over')</script></h1>";
				session_destroy();
			}
			if($_SESSION['submit']==2)
       		{
       			echo "<script>window.location.href='../exercise1/';alert('You are Win')</script>";
				session_destroy();         		
			}
		}		
	}

?>
<!DOCTYPE html>
<html>
<head>
	<style> 
		div{
			width: 19%;
			background: #AFDECF;
		}
	</style>
	<title></title>
</head>
<body>
<form action="<?php echo 'Exer1.php?id='.$_SESSOION['id']; ?>" method="POST">
	<div>
		<h1><?php echo "Guess the Number".$nuM; ?></h1>
	</div>
	<input type="number" name="num">
	<input type="submit" name="submit" value="Next">
</form>
</body>
</html>