<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br>
        <br>
        <?php  
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>
        <form action="" method="Post">
            
            <table class="table-30">
                <tr>
                    <td>FullName: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter your fullName">
                </td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="Username" placeholder="Enter your Username">
                </td>
                </tr>
                <tr>
                    <td>password: </td>
                    <td>
                        <input type="password" name="pwd" placeholder="Enter your password">
                </td>
                </tr>
                <tr>
                    <td class='col-2'>
                        <input type="submit" name="submit" class="btn-secondary"  value="Add Admin">
                </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php

include('partials/footer.php');
?>


<?php 

if(isset($_POST['submit']))

{
    $fullName=$_POST['full_name'];
    $username=$_POST['Username'];
    $pwd=md5($_POST['pwd']);

    $sql="INSERT INTO `tbl_admin`(`FullName`, `UserName`, `Password`) VALUES ('$fullName','$username',
    '$pwd')";
    $res = mysqli_query($conn, $sql) or die(mysqli_error());
    if ($res == TRUE) {
        # Data Inserted
        $_SESSION['add']  ="<div class='success'>Admin Added Successfully</div>";
        // redirect Page to Add Admin
        header('location:'.SITEURL.'admin/manage-admin.php');
    } else {
        # Failed to Insert Data
        $_SESSION['add']  ="<div class='error'>Failed to Add Admin</div>";
        // redirect Page to Add Admin
        header('location:'.SITEURL.'admin/add-admin.php');
    }
    
}



?>