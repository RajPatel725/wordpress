<?php

$conn = new mysqli('localhost', 'root','','sql_practice' );

if ($conn)
{
    echo 'Data Base Connect <br>';
}else{
    echo 'Data Base Not Connet <br>';
}

$userId = (isset($_REQUEST['id'])? $_REQUEST['id']:"");

$fetch_DB = array();
if (isset($userId)){
    $sql_select = "SELECT * FROM `register` WHERE id='$userId'";
    $get_data = mysqli_query($conn,$sql_select);
    $fetch_DB  = mysqli_fetch_assoc($get_data);

}

    if (isset($_REQUEST['id'])){

        echo 'Cureent id is <b>'. $userId . '</b>';

    }

    $email_e = 'raj@gmail.com';
    $select_email = "SELECT * FROM `register` WHERE email='$email_e'";
    $res = mysqli_query($conn,$select_email);

    if(mysqli_num_rows($res))
    {
        echo 'This email address is already used!';
    }
    else
    {
        echo 'lol';
    }

if (isset($_POST['submit'])){

    if(isset($_REQUEST['id'])){

        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $userId = $_REQUEST['id'];

        $UP_sql = "UPDATE register SET fname='$fname',email='$email',password='$password' WHERE id=$userId";
        // echo $UP_sql;
        mysqli_query($conn, $UP_sql);
        

    }
    else
    {
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT INTO register VALUES (null,'$fname','$email','$password')";
        mysqli_query($conn, $sql);
    }
    

}

if(isset($_REQUEST['delete'])){
    $new = $_REQUEST['delete'];
    $delete = "DELETE FROM register WHERE id='$new' ";
    mysqli_query($conn,$delete);
    
    echo $_REQUEST['delete'].' is deleted ';
}



?>

<form action="http://localhost/SQL/register.php<?php echo (isset($_REQUEST['id'])? '?id='.$userId:""); ?>" method="post">
    <label for="name">Name
        <input type="text" name="fname" value="<?php echo (isset($_REQUEST['id'])?$fetch_DB['fname']:""); ?>" />
    </label>

    <label for="email">Email
        <input type="email" name="email" value="<?php echo (isset($_REQUEST['id'])?$fetch_DB['email']:''); ?>" />
    </label>

    <label for="password">Password
        <input type="password" name="password" value="<?php echo (isset($_REQUEST['id'])?$fetch_DB['password']:''); ?>" />
    </label>

    <button class="btn" name="submit">Submit</button>
        
</form>


<table>
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Email</td>
        <td>Password</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
        <?php

        $get_data = 'select * from register';
        $result = $conn->query($get_data);

        while ( $row = $result->fetch_assoc())
        {
        ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['fname']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><a href="<?php echo 'http://localhost/SQL/register.php?id='.$row['id']; ?>">Edit</a></td>
                <td><a href="<?php echo 'http://localhost/SQL/register.php?delete='.$row['id']; ?>">Delete</a></td>
            </tr>
        <?php }
        $conn->close();
        ?>

</table>