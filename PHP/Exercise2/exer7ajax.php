<?php
$res=array();


if(isset($_GET['number']) && is_numeric($_GET['number'])){
	$no= $_GET['number'];
	if($no % 2==0){
		$res['checkres']="Even";
	}
	else
	{
		$res['checkres']="odd";
	}


	$res['status']="success";
}
else{
	$res['status']="error";

}

echo json_encode($res);
?>