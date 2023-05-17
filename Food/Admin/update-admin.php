<?php
include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

<br>
<br>
<?php
$id = $_GET['id'];

$sql="SELECT * FROM `tbl_admin` WHERE id=$id";

$res = mysqli_query($conn, $sql);
if($res == TRUE){
    $row = mysqli_num_rows($res);
    if($row == 1){
        $data=mysqli_fetch_assoc($res);
        
        $dataName = $data['FullName'];
        $dataUser = $data['UserName'];
    }else{
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
}
?>
          <form action="" method="Post">
            
            <table class="table-30">
                <tr>
                    <td>FullName: </td>
                    <td>
                        <input type="text" value="<?php echo $dataUser  ?>" name="full_name" placeholder="Enter your fullName">
                </td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="Username" value="<?php echo $dataName  ?>" placeholder="Enter your Username">
                </td>
                </tr>
                <tr>
                    <td class='col-2'>
                    <input type="hidden" name="id" class="btn-secondary"  value="<?php echo $id  ?>">                        
                        <input type="submit" name="submit" class="btn-secondary"  value="Update Admin">
                </td>
                </tr>
            </table>
        </form>
    </div>
</div>


<?php
if(isset($_POST['submit']))
{
$id=$_POST['id'];
$full_name=$_POST['full_name'];
$UserName=$_POST['Username'];

$sql ="UPDATE `tbl_admin` SET `FullName`='$full_name',`UserName`='$UserName' WHERE id=$id";
$result = mysqli_query($conn, $sql);

if($result == TRUE)
{
    $_SESSION['update'] = "<div class='success'> Update Successfully</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');

}else{
    $_SESSION['update'] = "<div class='error'>Fail to Update</div>";
}
}

?>



<?php
include('partials/footer.php');
?>

