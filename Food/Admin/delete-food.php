<?php
include('../config/constant.php');
if(isset($_GET['id']) && isset($_GET['title'])){
    $id= $_GET['id'];
$sql="DELETE FROM `tbl_food` WHERE id='$id'";
$res=mysqli_query($conn, $sql);
if ($res){
    $_SESSION['delete']="<div class='success'>Deleted Successfully<div>";
    header('location:'.SITEURL.'admin/manage-food.php');
}else{
    $_SESSION['delete']="<div class='error'>Delete not working<div>";
    header('location:'.SITEURL.'admin/manage-food.php');
}
}else{
    $_SESSION['wrongRoute']="<div class='error'>wrong Route <div>";
    header('location:'.SITEURL.'admin/manage-food.php');
}
?>