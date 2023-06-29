<?php
$randomNumber=rand(1,100);
$array = array();
for ($i=0; $i <= $randomNumber ; $i++) { 
	$array[]=$i;
}
foreach ($array as $number) {
	if($array[$number] % 2==0)
	{
		echo $array[$number]." Number is Even <br>";
	}
	else
	{
		echo $array[$number]." Number is Odd<br>";
	}
}
?>
