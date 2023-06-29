<?php
include("include/header.php");
echo $Header;
if(isset($_POST['submit']))
{
	$nAme=$_POST['Name'];
	$eMail=$_POST['Email'];
	$pHone=$_POST['Phone'];
	$aDdress=$_POST['Address'];
	$gEnder=$_POST['Gender'];
	$sTandard=$_POST['Standard'];
	$hObby=$_POST['Hobby'];	
	$hoBbys="";
	foreach ($hObby as $hObby1) {
		$hoBbys .=$hObby1.",";
	}
	$bIrthDate=$_POST['BirthDate'];
	$pHoto=$_FILES["photo"]["name"];
	$dIr="image/";	
	$tMpnm=$dIr.$pHoto;
	$checkEmailAndPhone=mysqli_query($Conn,"select * from user where email='$eMail' and phone='$pHone'");
	$rOw=mysqli_num_rows($checkEmailAndPhone);
	if($rOw)
	{
		echo '<script type="text/javascript">alert("User already Exist");</script>';
	}
	else
	{
		$aLlowed =  array('jpeg','jpg', "png", "JPEG","JPG", "PNG");
		$eXt = pathinfo($pHoto, PATHINFO_EXTENSION);
		if(!in_array($eXt,$aLlowed) ) {
			echo '<script type="text/javascript">alert("Sorry, only JPG, JPEG, PNG files are allowed.");</script>';
		}
		else
		{
			if(move_uploaded_file($_FILES["photo"]["tmp_name"],$tMpnm))
			{
				$arr=getimagesize($tMpnm);		
				list($w,$h,$t,$a)=$arr;
				if($t>2)
				{
					echo "Sorry, wrong type";
					die();
				}
				else
				{
					echo "adfas";
					$sQl="insert into user values(NULL,'$nAme','$eMail',$pHone,'$aDdress','$gEnder','$sTandard','$hoBbys','$bIrthDate','$pHoto')";
					$rEs=mysqli_query($Conn,$sQl);
					header("location: List.php");
				}
			}
		}
	}
}
?>
<body>
	<h1><u>Add User</u></h1>
	<table align="center">
		<form  method="POST" enctype="multipart/form-data">
			<tr>
				<td class="td1">Name</td><td><input type="textbox" name="Name"></td>
			</tr>
			<tr>
				<td class="td1">Email</td><td><input type="textbox" name="Email"></td>
			</tr>
			<tr>
				<td class="td1">Phone</td><td><input type="number" name="Phone"></td>
			</tr>
			<tr>
				<td class="td1">Address</td><td><textarea name="Address" style="width: 172px;"></textarea></td>
			</tr>
			<tr>
				<td class="td1">Gender</td><td>Male<input type="radio" name="Gender" class="radio" value="Male">Female<input type="radio" name="Gender" class="radio" value="Female"></td>
			</tr>
			<tr>
				<td class="td1">Standard</td><td><select class="select" name="Standard">
								<option value="10th" name="Standard[]">10th</option>
								<option value="12th" name="Standard[]">12th</option>
								<option value="Graduation" name="Standard[]">Graduation</option>
							</select>
				</td>		
			</tr>
			<tr>
				<td class="td1">Hobby</td>
				<td>Traveling<input type="checkbox" name="Hobby[]" value="Traveling" class="checkbox">&nbsp;
					Playing<input type="checkbox" name="Hobby[]" value="Playing" class="checkbox"><br>
					Reading<input type="checkbox" name="Hobby[]" value="Reading" class="checkbox">&nbsp;&nbsp;
					Movie<input type="checkbox" name="Hobby[]" value="Movie" class="checkbox"></td>
			</tr>
			<tr>
				<td class="td1">Birthdate</td><td><input type="date" name="BirthDate" class="date"></td>
			</tr>
			<tr>
				<td class="td1">Photo</td><td><input type="file" name="photo" value="" style="width: 70%;" /></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" class="submit"></td>
			</tr>
		</form>
	</table>
</body>
<?php
include("include/footer.php");
?>