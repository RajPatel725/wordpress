<?php
function fun()
{
	for($j=1; $j < 11; $j++) { 
		echo "<td>";
		for($i=1;$i<11;$i++)
		{
			$aRray = array($j."*".$i => $ans=$j*$i );
			print_r($aRray);
		}
		echo "</td>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<style>
		td{
			font-size : 13.5px;
		}
	</style>
	<title></title>
</head>
<body>
	<table>
		<tr>
			<?php echo fun();?>
		</tr>
	</table>
</body>
</html>