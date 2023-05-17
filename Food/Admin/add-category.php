<?php include('partials/menu.php'); ?>

<div class="main-content">
<div class="wrapper">
    <h1>Add Category<h1>
    <br>
    <br>
<?php

if(isset($_SESSION['add-category-not-working'])){
    echo $_SESSION['add-category-not-working'];
    unset($_SESSION['add-category-not-working']);
}


if(isset($_SESSION['upload'])){
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
}


?>
     <form action="" method="Post" enctype="multipart/form-data">
            
            <table class="table-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Enter Title">
                </td>
                </tr>
                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image" >
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
                        <input type="submit" name="submit" class="btn-secondary"  value="Add Category">
                </td>
                </tr>
            </table>
        </form>
</div>
</div>
<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    if (isset($_POST['featured'])) {
        $featured = $_POST['featured'];
    } else {
        $featured = "No";
    }
    if (isset($_POST['active'])) {
        $active = $_POST['active'];
    } else {
        $active = "No";
    }

    if(isset($_FILES['image']['name'])){
        $image_name=$_FILES['image']['name'];
        $tmp_name=$_FILES['image']['tmp_name'];

        if($image_name !=""){

        $ext = @end(explode('.', $image_name));

        $image_name = "Food_Category_".rand(000, 999).'.'.$ext;

        $destination="../Upload/".$image_name;

        $upload = move_uploaded_file($tmp_name, $destination);
        if($upload==false){
            $_SESSION['upload']="<div class='error'>Error Uploading theImage</div>";
        header('location'.SITEURL.'admin/add-category.php');
        die();
    }
}
    
    }
        else{
            $image_name="";
    }
    $sql = "INSERT INTO `tbl_category`( `Title`, `ImageName`, `Featured`, `Active`) VALUES ('$title',' $image_name','$featured','$active')";
    
    $res = mysqli_query($conn, $sql);
    if($res==TRUE){
        $_SESSION['add-category']="<div class='success'>Category Added Succesfully</div>";
        header('location'.SITEURL.'admin/manage-category.php');
    }else{
        $_SESSION['add-category-not-working']="<div class='success'>Category Added Failed</div>";
        header('location'.SITEURL.'admin/add-category.php');
    }
}

?>

<?php include('partials/footer.php'); ?>
