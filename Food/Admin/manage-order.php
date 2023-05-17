<?php  include('partials/menu.php');?>

    <!-- main-content-starts -->
    <div class="main-content">
<div class="wrapper">
        <h1>Manage Orders</h1>
        <br>
        <br>

        <?php

if (isset($_SESSION['updateSuccess'])) {
    echo $_SESSION['updateSuccess'];
    unset($_SESSION['updateSuccess']);
}
?>
             <!-- Button to Add Admin -->
<table class='table'>
    <tr>
        <th>S/N</th>
        <th>Customer Name</th>
        <th>Email</th>
        <th>Food</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Ordered Date</th>
        <th>Status</th>
        <th>Phone Number</th>
        <th>Customer Address</th>
        <th>Actions</th>
    </tr>
<?php 
$sql  = "SELECT * FROM tbl_order ORDER BY id DESC";
$res =mysqli_query($conn, $sql);
$i=1;
$count=mysqli_num_rows($res);
if($count > 0){
while($row=mysqli_fetch_assoc($res)){
    $id=$row['id'];
    $food=$row['food'];
    $price=$row['price'];
    $qty=$row['qty'];
    $total=$row['total'];
    $Order_date=$row['Order_date'];
    $Status=$row['Status'];
    $Customer_name=$row['Customer_name'];
    $Customer_contact=$row['Customer_contact'];
    $Customer_Email=$row['Customer_Email'];
    $Customer_Address=$row['Customer_Address'];
    ?>
    <tr>
        <td><?php echo $i++ ?></td>
        <td><?php echo $Customer_name ?></td>
        <td><?php echo $Customer_Email ?></td>
        <td><?php echo $food ?></td>
        <td><?php echo $price ?></td>
        <td><?php echo $qty ?></td>
        <td><?php echo $total ?></td>
        <td><?php echo $Order_date ?></td>
        <td>
            <?php
             if($Status=='Ordered'){
                 echo "<label>$Status</label>";
             }elseif($Status=='On Delevery'){
                echo "<label style='color:orange'>$Status</label>";
                 
             }elseif($Status=='Delivered'){
                echo "<label style='color:green'>$Status</label>";
                 
             }elseif($Status=='Canceled'){
                echo "<label style='color:red'>$Status</label>";
                 
             }
             ?>
    
    </td>
        <td><?php echo $Customer_contact ?></td>
        <td><?php echo $Customer_Address ?></td>
        <td> 
            <a href="<?php echo SITEURL ?>admin/update-order.php?order_id=<?php echo $id ?>" class="btn-secondary">Update Ordered</a> 
    </td>
    </tr>
    <?php
}
}else{
    "<td>
    <div class='error'>No Ordered Products available</div>
    
    </td>";
}

?>

    
</table>
    </div>
</div>

    <!-- main-content Ends -->

<?php  include('partials/footer.php');?>