<?php include ('..\config\constants.php'); ?>
<?php
 session_start();
$id=$_GET['id'];  //Get the id from get method passed from manage-admin.php
$sql= "DELETE from tbl_admin where id=$id";   //Delete QUERY
    
$res=mysqli_query($conn,$sql);   //Execute 
session_start(); 
if ($res==TRUE) 
{

    $_SESSION['delete']="<div class='success'>Admin Deleted Successfully</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
    
}

else
{
    $_SESSION['delete']= "<div class='error'>Admin Failed to Delete</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
    
}


?>
