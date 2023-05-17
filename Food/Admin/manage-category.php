<?php  include('partials/menu.php');?>

    <!-- main-content-starts -->
    <div class="main-content">
<div class="wrapper">
        <h1>Manage Category</h1>
        <br>
        <br>
        <?php
if(isset($_SESSION['add-category'])){
    echo $_SESSION['add-category'];
    unset($_SESSION['add-category']);
}

if(isset($_SESSION['remove'])){
    echo $_SESSION['remove'];
    unset($_SESSION['remove']);
}

if(isset($_SESSION['delete'])){
    echo $_SESSION['delete'];
    unset($_SESSION['delete']);
}


if(isset($_SESSION['no-category'])){
    echo $_SESSION['no-category'];
    unset($_SESSION['no-category']);
}

if(isset($_SESSION['update-category'])){
    echo $_SESSION['update-category'];
    unset($_SESSION['update-category']);
}

if(isset($_SESSION['update-category-img'])){
    echo $_SESSION['update-category-img'];
    unset($_SESSION['update-category-img']);
}


?>
 <br>
        <br> <br>
        <br>
        <!-- Button to Add Admin -->
<a href="<?php  echo SITEURL ?>admin/add-category.php" class='btn-primary'>Add Category</a>
        <br>
        <br>
        <br>


<table class='table'>
    <tr>
        <th>S/N</th>
        <th>FoodName</th>
        <th>Image</th>
        <th>Featured</th>
        <th>Active</th>
        <th>Actions</th>
    </tr>
<?php

$sql = "SELECT * FROM `tbl_category`";
$res=mysqli_query($conn, $sql);
$count= mysqli_num_rows($res);
$i=1;
if($count > 0){
    while($data=mysqli_fetch_assoc($res))
    {
        $id=$data['id'];
        $Title=$data['Title'];
        $ImageName=$data['ImageName'];
        $Featured=$data['Featured'];
        $Active=$data['Active'];
        ?>
          <tr>
        <td><?php echo $i++ ?></td>
        <td><?php echo $Title ?></td>

        <td>

        <?php
         
         if( $ImageName !="")
         {
            ?>
             
            <img src="<?php echo SITEURL ?>Upload/<?php echo $ImageName;?>">
            <?php
         }else{
             echo "<img src='../images/default-img2.jpg' alt=''>";
         }
         
         ?>
        
        </td>

        <td><?php echo $Featured ?></td>
        <td><?php echo $Active ?></td>
        <td> 
            <a href="<?php echo SITEURL ?>admin/update-category.php?id=<?php echo $id ?>&ImageName=<?php echo $ImageName ?>" class="btn-secondary">Update Category</a> 
            <a href="<?php echo SITEURL ?>admin/delete-category.php?id=<?php echo $id ?>&ImageName=<?php echo $ImageName ?>" class="btn-danger"> Delete Category</a> 
    </td>
    </tr>
        <?php
        
    }
}else
{
    ?>
        <tr>
        <td><div  class='error'>No Category Added</div></td>
    </tr>
    <?php
}

?>
  
</table>
    </div>
</div>

    <!-- main-content Ends -->

<?php  include('partials/footer.php');?>