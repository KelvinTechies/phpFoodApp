<?php include('./partials/menu.php') ?>



<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
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
        <br>
        <br>
        <form action='' method='post' enctype=multipart/form-data>
        <table class="table-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Enter Title of Food">
                </td>
                </tr>
                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image" >
                </td>
                </tr>
                <tr>
                    <td>Descripton: </td>
                </td>
                </tr>
                <tr>
<td>
<textarea name='desc' placeholder='description of food'></textarea>

</td>                  
                </tr>
                <tr>
                    <td>Price: </td>
                </td>
                </tr>
                <tr>
<td>
<input type='number' name='price' placeholder='Price of food'>

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

$sql = "SELECT * From tbl_category WHERE active='Yes'";
$res = mysqli_query($conn, $sql);

$count = mysqli_num_rows($res);

if ($count > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $id = $row['id'];
        $Title = $row['Title'];
        $id = $row['id'];
        ?>
        
<option value='<?php echo $id; ?>'><?php echo $Title; ?></option>

        <?php

    }

} else {
    ?>
<option value='1'>No Categories Found</option>

    <?php

}

?>
<!-- <option value='1'>Food</option>
<option value='2'>Snacks</option> -->
</select>

</td>                  
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                    Yes
                        <input type="radio" value="Yes" name="featured" >
                        No
                        <input type="radio" Value="No" name="featured" >
                </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                    Yes
                        <input type="radio" value="Yes" name="active">
                        No
                        <input type="radio" value="No" name="active" >
                </td>
                </tr>
                <tr>
                    <td class='col-2'>
                        <input type="submit" name="submit" class="btn-secondary"  value="Add Food">
                </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include('./partials/footer.php') ?>

<?php

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $category_id = $_POST['category_id'];
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
        $filetmp = $file['tmp_name'];
        $filesize = $file['size'];
        $fileerror = $file['error'];

        $ext = explode('.', $filename);

        if ($fileerror == 0) {
            if ($filesize < 500000000) {
                $fileNewName = 'food_'. rand(000, 999) . '.'.$ext;
                
                $destination = '../upload/Food/' . '.' .$fileNewName;
                $upload = move_uploaded_file($filetmp, $destination);
                if ($upload) {
                    $sql2 = "INSERT INTO `tbl_food`( `Title`, `Description`, `Price`, `ImageName`, `category_id`, `Featured`, `Active`) VALUES ('$title','$desc','$price','$fileNewName','$category_id','$featured','$active')";

                    $res2 = mysqli_query($conn, $sql2);

                    if($res2){
                        $_SESSION['success'] = "<div class='success'>Food Added Successfully</div>";
                        header('location:' . SITEURL . 'admin/manage-food.php');
                    }else{
                        $_SESSION['failedtoUpload'] = "<div class='error'>Food Added Successfully Failed</div>";
                        header('location:' . SITEURL . 'admin/manage-food.php');
                    }

                } else {
                    $_SESSION['errorOccured'] = "<div class='error'>error Occured During Uploading</div>";
                    header('location:' . SITEURL . 'admin/add-food.php');
                }
            } else {
                $_SESSION['uploadingsizeError'] = "<div class='error'>The File size is too big to Uploading The Image</div>";
                header('location:' . SITEURL . 'admin/add-food.php');

            }
        } else {
            $_SESSION['erroruploading'] = "<div class='error'>Error Uploading The Image</div>";
            header('location:' . SITEURL . 'admin/add-food.php');
        }
    }

}


    ?>