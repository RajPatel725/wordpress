<?php
include("include/header.php");
echo $Header;
if($_GET['Email'])
{
	$emAil=$_GET['Email'];
	$sQl="delete from user where email='$emAil'";
	mysqli_query($Conn,$sQl);
	header("location: List.php");
}
?>