<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
<?php 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>
 <form action="" method="Post">
            
            <table class="table-30">
                
                <tr>
                    <td>Current password: </td>
                    <td>
                        <input type="password" name="c_pwd" placeholder="Enter your Current password">
                </td>
                </tr>
                <tr>
                    <td>New password: </td>
                    <td>
                        <input type="password" name="N_pwd" placeholder="Enter your New password">
                </td>
                </tr>
                <tr>
                    <td>Confirm password: </td>
                    <td>
                        <input type="password" name="re_pwd" placeholder="Enter your Confirm password">
                </td>
                </tr>
                <tr>
                    <td class='col-2'>
                        <input type="hidden" name="id"   value="<?php echo $id; ?>">
                        <input type="submit" name="submit" class="btn-secondary"  value="Change Password">
                </td>
                </tr>
            </table>
        </form>


    </div>
</div>
<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $current = md5($_POST['c_pwd']);
    $N_pwd = md5($_POST['N_pwd']);
    $re_pwd = md5($_POST['re_pwd']);

    $sql = "SELECT * FROM `tbl_admin` WHERE id=$id AND password='$current'";

    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $count = mysqli_num_rows($res);
        if ($count == 1) {
            if ($N_pwd != $re_pwd) {
                $_SESSION['pwd-not-match'] = "<div class='error'>Password mixmatch</div>";
                header('location:' . SITEURL . 'admin/manage-admin.php');

            } else {
                $sql2 = "UPDATE `tbl_admin` SET `password`='$N_pwd' WHERE id=$id";
                $res2 = mysqli_query($conn, $sql2);

                if ($res2 == true) {
                    $_SESSION['change-pwd'] = "<div class='success'>Password Change Successfully</div>";
                    header('location:' . SITEURL . 'admin/manage-admin.php');


                } else {
                    $_SESSION['change-pwd'] = "<div class='error'>Password Change Failed</div>";
                    header('location:' . SITEURL . 'admin/manage-admin.php');

                }
            }
        } else {
            $_SESSION['user-not-found'] = "<div class='error'>User Not Found</div>";


            header('location:' . SITEURL . 'admin/manage-admin.php');

        }
    }
}


?>
<?php include('partials/footer.php'); ?>
