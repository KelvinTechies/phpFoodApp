<?php
include('partials/menu.php');
?>



<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br>
        <br>
<?php
if (isset($_GET['id']) && isset($_GET['ImageName'])) {
    $id = $_GET['id'];
    $ImageName = $_GET['ImageName'];
    $sql = "SELECT * FROM tbl_category where id =$id";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        $row = mysqli_fetch_assoc($res);
        $title = $row['Title'];
        $ImageName = $row['ImageName'];
        $Featured = $row['Featured'];
        $Active = $row['Active'];
    } else {
        $_SESSION['no-category'] = "<div class='error'>No Category Found</div>";
        header('location:' . SITEURL . 'admin/manage-category.php');

    }
} else {
    header('location:' . SITEURL . 'admin/manage-category.php');
}

?>
         <form action="" method="Post" enctype="multipart/form-data">
            
            <table class="table-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" value="<?php echo $title ?>" name="title" placeholder="Enter Title">
                </td>
                </tr>
                <tr>
                    <td>Current Image: </td>
                    <td>
                    <?php
                    if ($ImageName != "") {
                        ?>
                        <img src="<?php echo SITEURL ?>Upload/<?php echo $ImageName; ?>">
                        <?php

                    } else {

                        echo "<img src='../images/default-img2.jpg' alt=''>";
                    }
                    ?>
                    
                </td>
                </tr>
                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type="file" name="image" >
                </td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                    Yes
                        <input <?php if ($Featured == 'Yes') {
                                    echo 'checked';
                                } ?> type="radio" value="Yes" name="featured" >
                        No
                        <input <?php if ($Featured == 'No') {
                                    echo 'checked';
                                } ?>  type="radio" Value="No" name="featured" >
                </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                    Yes
                        <input type="radio" <?php if ($Active == 'Yes') {
                                                echo 'checked';
                                            } ?> value="Yes" name="active">
                        No
                        <input type="radio" <?php if ($Active == 'Yes') {
                                                echo 'checked';
                                            } ?> value="No" name="active" >
                </td>
                </tr>
                <tr>
                    <td class='col-2'>
                    <input type='hidden' name='id' value="<?php echo $id ?>">
                        <input type="submit" name="submit" class="btn-secondary"  value="updated Category">
                </td>
                </tr>
            </table>
        </form>


        <?php
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];
            if (isset($_FILES['image'])) {
                $file = $_FILES['image'];
                $filename = $file['name'];
                $filetmp = $file['tmp_name'];
                $filetype = $file['type'];
                $fileerror = $file['error'];
                $filesize = $file['size'];

                $ext = end(explode('.', $filename));
                if ($fileerror == 0) {
                    if ($filesize < 500000000000) {

                        $newFileName = uniqid('', true) . '.' . $ext;
                        $destination = "../upload/" . '.' . $newFileName;
                        $uploaded = move_uploaded_file($filetmp, $destination);
                        if ($uploaded == false) {
                            $_SESSION['update-category-img'] = "<div class='error'>File size Not Supported</div>";
                            header('location:' . SITEURL . 'admin/manage-category.php');

                        }
                    } else {
                        $_SESSION['update-category-img'] = "<div class='error'>File size is too big</div>";
                        header('location:' . SITEURL . 'admin/manage-category.php');

                    }

                } else {
                    $_SESSION['update-category-img'] = "<div class='error'>Something Went Wrong</div>";
                    header('location:' . SITEURL . 'admin/manage-category.php');

                }
            }
            $sql2 = "UPDATE `tbl_category` SET `Title`='$title',`ImageName`=' $newFileName',`Featured`='$featured',`Active`='$active' WHERE id=$id";

            $res2 = mysqli_query($conn, $sql2);

            if ($res == true) {
                $_SESSION['update-category'] = "<div class='success>Updated Succesfully</div>";
                header('location:' . SITEURL . 'admin/manage-category.php');
            } else {
                $_SESSION['update-category'] = "<div class='error'>Updating Failed</div>";
                header('location:' . SITEURL . 'admin/manage-category.php');

            }

        }
            ?>
    </div>
</div>





<?php include('partials/footer.php');?>
