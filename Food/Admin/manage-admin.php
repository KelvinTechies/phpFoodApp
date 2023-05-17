<?php
include('partials/menu.php');

?>
    <!-- main-content-starts -->
<div class="main-content">
<div class="wrapper">
        <h1>Manage Admin</h1>
        <br>
        <br>
<?php 
if (isset($_SESSION['add'])) {
    echo $_SESSION['add'];
    unset($_SESSION['add']);
    
}

if (isset($_SESSION['delete'])) {
    echo  $_SESSION['delete'];
    unset($_SESSION['delete']);
    
}

if (isset($_SESSION['update'])) {
    echo  $_SESSION['update'];
    unset($_SESSION['update']);
    
}
 
if (isset($_SESSION['user-not-found'])) {
    echo  $_SESSION['user-not-found'];
    unset($_SESSION['user-not-found']);
    
}
if (isset($_SESSION['pwd-not-match'])) {
    echo  $_SESSION['pwd-not-match'];
    unset ($_SESSION['pwd-not-match']);
    
}
if (isset($_SESSION['change-pwd'])) {
    echo  $_SESSION['change-pwd'];
    unset ($_SESSION['change-pwd']);
    
}




?>
        <br>
        <br>

<!-- Button to Add Admin -->
<a href="./add-admin.php" class='btn-primary'>Add Admin</a>
        <br>
        <br>
        <br>
<table class='table'>
    <tr>
        <th>S/N</th>
        <th>Full Name</th>
        <th>Username</th>
        <th>Actions</th>
    </tr>

    <?php 
    $sql = "SELECT * FROM `tbl_admin`";
    $res = mysqli_query($conn, $sql);

    if ($res == TRUE) {
        $i=1;
        $rows = mysqli_num_rows($res);
        if ($rows>0) {
                    // we have data in the database
            while ($count = mysqli_fetch_assoc($res)) {
                $id = $count['id'];
                $FullName = $count['FullName'];
                $UserName = $count['UserName'];

            ?>
                          <tr>
                                <td><?php  echo $i++ ?></td>
                                <td><?php  echo $FullName ?></td>
                                <td><?php  echo $UserName ?></td>
                                <td> 
                                    <a href="<?php echo SITEURL; ?>admin/admin-update-password.php?id=<?php echo $id ?>" class="btn-secondary">Change Password </a> 
                                    <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id ?>" class="btn-secondary">Update Admin</a> 
                                    <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id ?>" class="btn-danger"> DeleteAdmin</a> 
                                </td>
                        </tr>
                    <?php
            }

                } else {

                }

            }
            ?>

    
</table>
    </div>
</div>

    <!-- main-content Ends -->




<?php include('partials/footer.php'); ?>
</body>
</html>