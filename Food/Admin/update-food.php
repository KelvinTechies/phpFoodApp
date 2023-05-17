<?php include('./partials/menu.php'); ?>

<div class="main-content">

<div class="wrapper">
<h1>Update Food Data</h1>

        <br>
        <br>
        <br>
        <br>

        <?php
            $fudid = $_GET['food_id'];

            $sql2 = "SELECT * FROM `tbl_food` WHERE id=$fudid";
            $res2 = mysqli_query($conn, $sql2);
            $data2 = mysqli_fetch_assoc($res2);
            $dataTitle = $data2['Title'];
            $dataImageName = $data2['ImageName'];
            $dataPrice = $data2['Price'];
            $dataFeatured = $data2['Featured'];
            $dataActive = $data2['Active'];
            $dataDescription = $data2['Description'];
            $datacategory_id = $data2['category_id'];

        


        ?>


        <?php
        if (isset($_SESSION['errorOccured'])) {
            echo $_SESSION['errorOccured'];
            unset($_SESSION['errorOccured']);
        }
        if (isset($_SESSION['erroruploading'])) {
            echo $_SESSION['erroruploading'];
            unset($_SESSION['erroruploading']);
        }
        if (isset($_SESSION['uploadingsizeError'])) {
            echo $_SESSION['uploadingsizeError'];
            unset($_SESSION['uploadingsizeError']);
        }
        ?>
        <form action='' method='post' enctype=multipart/form-data>
        <table class="table-30">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text"value="<?php echo $dataTitle ?>"  name="title" placeholder="Enter Title of Food">
                </td>
                </tr>
                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image" >
                        <img src="<?php echo SITEURL; ?>Upload/Food/<?php echo $dataImageName; ?>">
                        
                </td>
                </tr>
                <tr>
                    <td>Descripton: </td>
                </td>
                </tr>
                <tr>
<td>
<textarea name='desc' placeholder='description of food'><?php echo $dataDescription ?></textarea>

</td>                  
                </tr>
                <tr>
                    <td>Price: </td>
                </td>
                </tr>
                <tr>
<td>
<input type='number' name='price' value="<?php echo $dataPrice ?>"placeholder='Price of food'>

</td>                  
                </tr>
                <tr>
                    <td>Category: </td>
                </td>
                </tr>
                <tr>
<td>
<select name='category_id' >

<?php

$sql1 = "SELECT * From tbl_category WHERE active='Yes'";
$res1 = mysqli_query($conn, $sql1);

$count1 = mysqli_num_rows($res1);

if ($count1 > 0) {
    while ($row1 = mysqli_fetch_assoc($res1)) {
        $id = $row1['id'];
        $Title = $row1['Title'];
        $id = $row1['id'];
        ?>
        
<option <?php if ($datacategory_id == $id) {
            echo 'selected';
        } ?> value='<?php echo $id; ?>'><?php echo $Title; ?></option>

        <?php

    }

} else {
    ?>
<option value='0'>No Categories Found</option>

    <?php

}

?>
</select>

</td>                  
                </tr>
                <tr>
                <td>Featured: </td>
                    <td>
                    Yes
                        <input <?php if ($dataFeatured == 'Yes') {
                                    echo 'checked';
                                } ?> type="radio" value="Yes" name="featured" >
                        No
                        <input <?php if ($dataFeatured == 'No') {
                                    echo 'checked';
                                } ?>  type="radio" Value="No" name="featured" >
                </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                    Yes
                        <input type="radio" <?php if ($dataActive == 'Yes') {
                                                echo 'checked';
                                            } ?> value="Yes" name="active">
                        No
                        <input type="radio" <?php if ($dataActive == 'Yes') {
                                                echo 'checked';
                                            } ?> value="No" name="active" >
                </td>
                </tr>
                <tr>
                    <td class='col-2'>
                        <input type="hidden" name="id"  value="<?php echo $id; ?>">
                        <input type="submit" name="submit" class="btn-secondary"  value="Update Food">
                </td>
                </tr>
            </table>
        </form>
<?php

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $price = $_POST['price'];

    $desc = $_POST['desc'];
    $cat_id = $_POST['category_id'];
    if (isset($_POST['featured'])) {
        $featured = $_POST['featured'];

    } else {
        $featured = 'No';

    }
    if (isset($_POST['active'])) {
        $active = $_POST['active'];

    } else {
        $active = 'No';

    }

    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];
        $filename = $file['name'];
        $filesize = $file['size'];
        $fileerror = $file['error'];
        $filetmp = $file['tmp_name'];

        $ext = explode('.', $filename);
        if ($fileerror == 0) {
            if ($filesize > 5000000) {
                $fileNewName = 'foodUpDaTe__' . rand(000, 999) . '.' . $ext;
                $destination = '../upload/food/' . '.' . $fileNewName;
                $upload = move_uploaded_file($filetmp, $destination);
                if ($upload) {
                    $sql3 = "UPDATE `tbl_food` SET `id`='$id',`Title`='$title',`Description`='$desc',`Price`='$price',`ImageName`='$fileNewName',`category_id`='$cat_id',`Featured`='$featured',`Active`='$active' WHERE id='$id'";
                    $res3 = mysqli_query($conn, $sql3);
                    if ($res3) {
                        $_SESSION['successup'] = "<div class='success'>Food Updated Successfully</div>";
                        header('location:' . SITEURL . 'admin/manage-food.php');
                    } else {
                        $_SESSION['failedtoUpload'] = "<div class='error'>Failed To Add Food  </div>";
                        header('location:' . SITEURL . 'admin/update-food.php');
                    }
                } else {
                    $_SESSION['errorOccured'] = "<div class='error'>error Occured During Uploading</div>";
                    header('location:' . SITEURL . 'admin/update-food.php');
                }
            } else {
                $_SESSION['uploadingsizeError'] = "<div class='error'>The File size is too big to Uploading The Image</div>";
                header('location:' . SITEURL . 'admin/update-food.php');
            }
        } else {
            $_SESSION['erroruploading'] = "<div class='error'>Error Uploading The Image</div>";
            header('location:' . SITEURL . 'admin/update-food.php');
        }
    }
}
?>
</div>


</div>
<?php include('./partials/footer.php'); ?>

