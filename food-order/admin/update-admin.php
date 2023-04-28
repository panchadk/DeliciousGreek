<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1> Update Admin </h1>

    <br><br>

<?php
    session_start();
    $id=$_GET['id'];
    $sql ="SELECT * from tbl_admin WHERE id=$id";
    $res=mysqli_query($conn,$sql);

    if ($res==true)
    {

        $count=mysqli_num_rows($res);

        if ($count==1)
        {

            $row=mysqli_fetch_assoc($res);
            $first_name=$row['firstname'];
            $last_name=$row['lastname'];
            $user_name=$row['username'];
            

        }

        else
        {
            header('location:'.SITEURL.'admin\manage-admin.php');
        }

    }

?>

                <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td> First Name:</td>
                        <td>
                        <input type="text" name="first_name" value="<?php echo $first_name ?>">
                        </td>
                    </tr>

                    <tr>
                        <td> Last Name:</td>
                        <td>
                        <input type="text" name="last_name" value="<?php echo $last_name ?>">
                        </td>
                    </tr>

                    <tr>
                        <td> User Name:</td>
                        <td>
                        <input type="text" name="user_name" value="<?php echo $user_name ?>">
                        </td>
                    </tr>

                    <tr> 
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <input type="submit" name="submit" value ="Update Admin" class ="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>

    </div>
</div>

<?php
//Check to see whether submit button is clicked or not

    if (isset($_POST['submit']))
    {
        echo "Button is clicked";
        $id=$_POST['id'];
        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $user_name=$_POST['user_name'];

    //SQL QUERY for Update

        $sql="UPDATE tbl_admin SET
        firstname='$first_name',
        lastname='$last_name',
        username='$user_name'
        WHERE id =$id
        ";

        echo $sql;
     //Execute the QUERY

     
     
     $res=mysqli_query($conn,$sql);

     if ($res==TRUE)
     {
        $_SESSION['update'] = "<div class='update'>Admin Update Successfully.</div>";
        header('location:'.SITEURL.'/admin/manage-admin.php');
     }
     else
     {
        $_SESSION['error'] = "<div class='error'>Admin Update Failed.</div>";
        header('location:'.SITEURL.'/admin/manage-admin.php');

     }

    }

?>

<?php include('partials/footer.php'); ?>
