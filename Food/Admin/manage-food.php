<?php  include('partials/menu.php');?>

    <!-- main-content-starts -->
    <div class="main-content">
<div class="wrapper">
        <h1>Manage Foods</h1>
        <br>
        <br>

        <?php
        if (isset($_SESSION['success'])) {
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        }
        if (isset($_SESSION['failedtoUpload'])) {
            echo $_SESSION['failedtoUpload'];
            unset($_SESSION['failedtoUpload']);
        }
        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if (isset($_SESSION['wrongRoute'])) {
            echo $_SESSION['wrongRoute'];
            unset($_SESSION['wrongRoute']);
        }
        if (isset($_SESSION['successup'])) {
            echo $_SESSION['successup'];
            unset($_SESSION['successup']);
        }
        if (isset($_SESSION['wrongRouteing'])) {
            echo $_SESSION['wrongRouteing'];
            unset($_SESSION['wrongRouteing']);
        }
        
        if (isset($_SESSION['no-food'])) {
            echo $_SESSION['no-food'];
            unset($_SESSION['no-food']);
        }    
?>
     <!-- Button to Add Admin -->
     <a href="./add-food.php" class='btn-primary'>Add Food</a>
        <br>
        <br>
        <br>
<table class='table'>
    <tr>
        <th>S/N</th>
        <th>Title</th>
        <th>Image</th>
        <th>Price</th>
        <th>Featured</th>
        <th>Active</th>
        <th>Actions</th>
    </tr>
    <?php
$n=1;
$sql3="SELECT * FROM `tbl_food`";
$res3=mysqli_query($conn, $sql3);

if($res3){
    $count3=mysqli_num_rows($res3);

    if($count3){
while($row=mysqli_fetch_assoc($res3)){
        $dataId=$row['id'];
        $dataTitle=$row['Title'];
        $dataPrice=$row['Price'];
        $dataImageName=$row['ImageName'];
        $dataFeatured=$row['Featured'];
        $dataActive=$row['Active'];
        ?>
    <tr>
    <td><?php echo $n++ ?></td>
    <td><?php echo $dataTitle ?></td>
    <td><img src='../upload/food/'<?php echo $dataImageName ?> </td>
    <td><?php echo $dataPrice ?></td>
        <td><?php echo $dataFeatured ?></td>
        <td><?php echo $dataActive ?></td>
       
        <td> 
            <a href="./update-food.php?food_id=<?php echo $dataId; ?>" class="btn-secondary">Update Food</a> 
            <a href="./delete-food.php?id=<?php echo $dataId; ?>&title=<?php echo $dataTitle; ?>" class="btn-danger"> Delete Food</a> 
    </td>
    </tr>
        <?php
    }
    }else{
        echo'<tr>
        <td>No data For Now</td>
        </tr>
        ';
    
}
}
?>

</table>


    </div>
</div>

    <!-- main-content Ends -->

<?php  include('partials/footer.php');?>