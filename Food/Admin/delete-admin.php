<?php
include('../config/constant.php');
$id=$_GET['id'];

$sql = "DELETE FROM `tbl_admin` WHERE id=$id";

$res= mysqli_query($conn, $sql);

if($res==TRUE){
    $_SESSION['delete'] ="<div class='success'>Admin Deleted SuccessFully</div>";
    header('location:'.SITEURL.'/admin/manage-admin.php');
}else{
    $_SESSION['delete']="<div class='error'>Admin ould not be Deleted</div>";
}








?>