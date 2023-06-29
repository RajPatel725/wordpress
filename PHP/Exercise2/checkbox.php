<?php
$cOn=mysqli_connect("localhost","root","","exercise1");
if(isset($_POST['submit']))
{
	$cHeckbox=implode(",",$_POST['checkbox']);
	mysqli_query($cOn,"insert into checkbox values('$cHeckbox')");
}
?>
<html>
<head>
<style>

</style>
</head>
<body>
<table>
<form action="#" method="POST">
	<tr>
		<td>a<input type="checkbox" name="checkbox[]" value="a"></td>
	</tr>
	<tr>
		<td>b<input type="checkbox" name="checkbox[]" value="b"></td>
	</tr>
	<tr>
		<td>c<input type="checkbox" name="checkbox[]" value="c"></td>
	</tr>
	<tr>
		<td>d<input type="checkbox" name="checkbox[]" value="d"></td>
	</tr>
	<tr>
		<td>e<input type="checkbox" name="checkbox[]" value="e"></td>
	</tr>
	<tr>
		<td>f<input type="checkbox" name="checkbox[]" value="f"></td>
	</tr>
	<tr>
		<td>g<input type="checkbox" name="checkbox[]" value="g"></td>
	</tr>
	<tr>
		<td>h<input type="checkbox" name="checkbox[]" value="h"></td>
	</tr>
	<tr>
		<td>i<input type="checkbox" name="checkbox[]" value="i"></td>
	</tr>
	<tr>
		<td>j<input type="checkbox" name="checkbox[]" value="j"></td>
	</tr>
	<tr>
		<td><input type="submit" name="submit"></td>
	</tr>
</form>
</body>
</html>
