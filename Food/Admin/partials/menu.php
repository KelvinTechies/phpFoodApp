<?php include('../config/constant.php');

if(!isset($_SESSION['user'])){
header('location:' . SITEURL . 'admin/login.php');
    
}
?>

<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food Order Website</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <!-- Menu Section Starts -->
    <div class="menu text-center">
<div class="wrapper">
<ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="manage-admin.php">Admin Manger</a></li>
        <li><a href="manage-category.php">Category</a></li>
        <li><a href="manage-food.php">Food</a></li>
        <li><a href="manage-order.php">Order</a></li>
        <li><a href="logout.php">LogOut</a></li>
    </ul>
</div>
    </div>
    <!-- Menu section Ends -->
