<?php include ('partials\menu.php'); ?>

        <div class="main-content">
            <div class="wrapper">
                <h1> Manage Admin </h1>
                <br/></br>
                <?php 
                    if(isset($_SESSION['add']))
                    {

                        echo $_SESSION['add'];  //Displaying session message
                        unset ($_SESSION['add']);  //Removing session message
                    }

                    if(isset($_SESSION['delete']))
                    {

                        echo $_SESSION['delete'];  //Displaying session message
                        unset ($_SESSION['delete']);  //Removing session message
                    }

                    if(isset($_SESSION['update']))
                    {

                        echo $_SESSION['update'];  //Displaying session message
                        unset ($_SESSION['update']);  //Removing session message
                    }
                  
                    if(isset($_SESSION['user-not-found']))
                    {

                        echo $_SESSION['user-not-found'];  //Displaying session message
                        unset ($_SESSION['user-not-found']);  //Removing session message
                    }

                    if(isset($_SESSION['pwd-not-match']))
                    {

                        echo $_SESSION['pwd-not-match'];  //Displaying session message
                        unset ($_SESSION['pwd-not-match']);  //Removing session message
                    }

                    if(isset($_SESSION['change-pwd']))
                    {

                        echo $_SESSION['change-pwd'];  //Displaying session message
                        unset ($_SESSION['change-pwd']);  //Removing session message
                    }

                ?>

                <br> <br> <br>

                <a href="add-admin.php" class="btn-primary"> Add Admin </a>
                <br/> <br/></br>
                <table class="tbl-full">
                    <tr>
                        <th>S.N. </th>
                        <th>Full Name </th>
                        <th>User Name </th>
                        <th>Actions </th>
                    </tr>

        <?php
            $sql="select id,firstname,lastname,username from tbl_admin";
            $res=mysqli_query($conn,$sql);
            //Check query is executed or not
            if ($res)
            {
                    $count=mysqli_num_rows($res);  //Check number of rows

                    if ($count>0)
                    {
                        while($rows=mysqli_fetch_assoc($res))
                        {
                                $id=$rows['id'];
                                $first_name=$rows['firstname'];
                                $last_name=$rows['lastname'];
                                $user_name=$rows['username'];
                   //Break the php below to HTML
                           ?>   
                        <tr>
                            <td><?php echo $id ?> </td>
                            <td><?php echo $first_name ?> </td>
                            <td> <?php echo $last_name ?> </td>
                            <td><?php echo $user_name ?></td>
                            <td>
                            <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>     
                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class ="btn-third">Delete Admin </a>
                            </td>
                        </tr>

                           <?php   //Start the php again

                        }

                    }
                    else
                    {


                    }

            }

        ?>
                </table>

            </div>
        </div>  
        
<?php include ('partials\footer.php'); ?>       
