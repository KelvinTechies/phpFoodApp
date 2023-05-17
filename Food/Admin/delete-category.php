<?php

include('../config/constant.php');
if(isset($_GET['id']) && isset($_GET['ImageName']))
{
    $id=$_GET['id'];
    $ImageName=$_GET['ImageName'];
    // if($ImageName !=""){
    //     $path = '../upload/'.$ImageName;
    //     $remove = unlink($path);
    //     if($remove==false){
    //         $_SESSION['remove']="<div class='error'>Failed to remove category Image</div>";
    //         header('location:'.SITEURL.'admin/manage-category.php');
    //         die();
    //     }
    // }
    $sql  = "DELETE FROM `tbl_category` WHERE id=$id";
    $res=mysqli_query($conn, $sql);
    if($res== true){
        $_SESSION['delete']="<div class='success'>deleted category Successfully</div>";
        header('location:'.SITEURL.'admin/manage-category.php');
    }else{
        $_SESSION['delete']="<div class='error'>Failed to delete category</div>";
        header('location:'.SITEURL.'admin/manage-category.php');
    }
}else{
    header('location'.SITEURL.'admin/manage-category.php');
}

?>