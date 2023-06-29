<?php
include("include/header.php");
echo $Header;
?>
<body>
	<h1>LIST</h1>
	<a href="Add_User.php" class="a1" >Add User</a>
	<table style="width: 100%;">
		<tr>
			<th class="td2">Name</th>
			<th class="td2">Email</th>
			<th class="td2">Phone</th>
			<th class="td2">Address</th>
			<th class="td2">Gender</th>
			<th class="td2">Standard</th>
			<th class="td2">Hobby</th>
			<th class="td2">BirthDate</th>
			<th class="td2">Photo</th>
		</tr>
		<?php
		$Sql="select * from user";
		if($Result=mysqli_query($Conn,$Sql))
		{
			while($Row=mysqli_fetch_row($Result))
			{
				echo '<tr>
						<td class="td2">';echo $Row[1].'</td>
						<td class="td2">';echo $Row[2].'</td>
					  	<td class="td2">';echo $Row[3].'</td>
					  	<td class="td2">';echo $Row[4].'</td>
					  	<td class="td2">';echo $Row[5].'</td>
					  	<td class="td2">';echo $Row[6].'</td>
					  	<td class="td2">';echo $Row[7].'</td>
					  	<td class="td2">';echo $Row[8].'</td>
					  	<td class="td2"><img src="image/';echo $Row[9].'" alt="" style="height: 100px; width: 100px;"/></td>
					  	<td class="td2"><a href="Edit.php?Email='.$Row[2].'">Edit</a></td>
					  	<td class="td2"><a href="Delete.php?Email='.$Row[2].'">Delete</a></td>
					  </tr>';
			}
		}
		?>
	</table>
</body>