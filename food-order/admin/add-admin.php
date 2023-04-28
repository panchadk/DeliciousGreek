<?php include ('partials\menu.php'); ?>

<div class="main-content">
            <div class="wrapper">
                <h1> Add Admin </h1>
                <br>
                <br>
                <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td> First Name:</td>
                        <td>
                        <input type="text" name="first_name" placeholder="Enter Your First Name">
                        </td>
                    </tr>

                    <tr>
                        <td> Last Name:</td>
                        <td>
                        <input type="text" name="last_name" placeholder="Enter Your Last Name">
                        </td>
                    </tr>

                    <tr>
                        <td> User Name:</td>
                        <td>
                        <input type="text" name="user_name" placeholder="Enter Your User Name">
                        </td>
                    </tr>
                    <tr>
                        <td> Password:</td>
                        <td>
                        <input type="password" name="password" placeholder="Enter Your Password">
                        </td>
                    </tr>

                    <tr> 
                        <td colspan="2">
                            <input type="submit" name="submit" value ="Add Admin" class ="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>

            </div>
            
         </div> 
 <?php include ('partials\footer.php'); ?>
<?php 
    session_start();
        //Process the value and save it into the database
    if(isset($_POST['submit']))  //Check whether submit button click or not
    {
        
            //1.Get the data from form
            $first_name=$_POST['first_name'];
            $last_name=$_POST['last_name'];
            $user_name=$_POST['user_name'];
            $password=md5($_POST['password']);

            //2. SQL Query to save the data
            $sql="INSERT INTO tbl_admin SET
            firstname='$first_name',
            lastname='$last_name',
            username='$user_name',
            password='$password' 
            ";
         //3. Execute the Query

       // $conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn));
        //$db_select=mysqli_select_db($conn,'food-order') or die(mysqli_error($conn));
        $res =mysqli_query($conn,$sql) or die (mysqli_error($conn));

        if($res==TRUE)
        {
            $_SESSION['add'] ="<div class='success'>Admin Added Successfully</div>";
            header("location:".SITEURL.'admin/manage-admin.php');

        }
        else
        {
            $_SESSION['add'] ="<div class='error'>Error adding Admin</div>";
            header("location:".SITEURL.'admin/add-admin.php');
        }


    }

?>








