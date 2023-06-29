<?php
include("include/header.php");
echo $Header;
$eMail=$_REQUEST['Email'];
if(isset($eMail))
{
	$sQl=mysqli_query($Conn,"select * from user where Email='$eMail'");
	$rOw=mysqli_fetch_row($sQl);
	$hoBby=$rOw[7];
	$arr=explode(",", $hoBby);
	if(isset($_POST['Submit']))
	{
		$naMe=$_POST['Name'];
		$eMail=$_POST['Email'];
		$phOne=$_POST['Phone'];
		$aDdress=$_POST['Address'];
		$geNder=$_POST['Gender'];
		$staNdard=$_POST['Standard'];
		$hoBbys=$_POST['Hobby'];
		$hobbYs2="";
		foreach ($hoBbys as $hObby1) {
			$hobbYs2 .=$hObby1.",";
		}
		$birthDate=$_POST['BirthDate'];
		$pHoto=$_FILES['photo']['name'];
		$dIr="image/";
		$tmpnm=$dIr.$pHoto;
		if($pHoto!=NULL)
		{
			if(move_uploaded_file($_FILES["photo"]["tmp_name"],$tmpnm))
			{
				$arr=getimagesize($tmpnm);		
				list($w,$h,$t,$a)=$arr;
				if($t>2)
				{
					echo "Sorry, wrong type";
					die();
				}
				else
				{
					mysqli_query($Conn,"update user set name='$naMe', address='$aDdress', gender='$geNder', standard='$staNdard', hobby='$hobbYs2', birth_date='$birthDate', photo='$pHoto' where user.email='$eMail'");
					header("location: List.php");
				}
			}
		}
		else
		{
			mysqli_query($Conn,"update user set name='$naMe', address='$aDdress', gender='$geNder', standard='$staNdard', hobby='$Hobbys2', birth_date='$birthDate' where user.email='$eMail'");
			header("location: List.php");
		}
	}
}
?>
<body>
	<h1><u>Edit User Detail</u></h1>
	<table align="center">
		<form method="POST" enctype="multipart/form-data">
			<tr>
				<td class="td1">Name</td><td><input type="text" name="Name" value='<?php echo $rOw[1]; ?>'></td>
			</tr>
			<tr>
				<td class="td1">Email</td><td><input type="email" name="Email" readonly="" value='<?php echo $rOw[2]; ?>'></td>
			</tr>
			<tr>
				<td class="td1">Phone</td><td><input type="number" name="Phone" readonly="" value='<?php echo $rOw[3]; ?>'></td>
			</tr>
			<tr>
				<td class="td1">Address</td><td><textarea name="Address" style="width: 172px;"><?php echo $rOw[4]; ?></textarea></td>
			</tr>
			<tr>
				<td class="td1">Gender</td><td>Male<input type="radio" name="Gender" value="Male" <?php if($rOw[5]=="Male"){echo "checked";}?>>Female<input type="radio" name="Gender" value="Female" <?php if($rOw[5]=="Female"){echo "checked";} ?>></td>
			</tr>
			<tr>
				<td class="td1">Standard</td><td><select name="Standard" class="select">
										<option value="10th" <?php if($rOw[6]=="10th"){echo "selected";} ?>>10th</option>
										<option value="12th" <?php if($rOw[6]=="12th"){echo "selected";} ?>>12th</option>
										<option value="Graduation" <?php if($rOw[6]=="Graduation"){echo "selected";} ?>>Graduation</option>
									  </select></td>
			</tr>
			<tr>
				<td class="td1">Hobby</td><td>Traveling<input type="checkbox" name="Hobby[]" value="Traveling" <?php foreach($arr as $arr2) {if($arr2=="Traveling"){echo "checked";}}?>>
								  Playing<input type="checkbox" name="Hobby[]" value="Playing" <?php foreach($arr as $arr2) {if($arr2=="Playing"){echo "checked";}}?>><br>
								  Reading<input type="checkbox" name="Hobby[]" value="Reading" <?php foreach($arr as $arr2) {if($arr2=="Reading"){echo "checked";}}?>>
								  Movie<input type="checkbox" name="Hobby[]" value="Movie" <?php foreach($arr as $arr2) {if($arr2=="Movie"){echo "checked";}}?>></td>
			</tr>
			<tr>
				<td class="td1">BirthDate</td><td><input type="date" name="BirthDate" class="date"  value='<?php echo $rOw[8]; ?>'></td>
			</tr>
			<tr>
				<td class="td1">Photo</td><td><input type="file" name="photo" style="width: 70%;"></td><td><img src="image/<?php echo $rOw[9]; ?>" alt="" style="height: 100px; width: 100px;"/></td>
			</tr>
			<tr>
				<td><input type="Submit" name="Submit" value="Update Data" class="a1"></td>	
			</tr>					
		</form>
	</table>
</body>