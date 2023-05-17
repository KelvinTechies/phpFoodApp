<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order<h1>
            <?php
            if (isset($_SESSION['updatefailed'])) {
                echo $_SESSION['updatefailed'];
                unset($_SESSION['updatefailed']);
            }
            ?>
<?php
$order_id = $_GET['order_id'];

$sql2 = "SELECT * FROM tbl_order WHERE id =$order_id";

$res2 = mysqli_query($conn, $sql2);

$count2 = mysqli_num_rows($res2);

if ($count2 == 1) {
    $row2 = mysqli_fetch_assoc($res2);

    $id = $row2['id'];
    $food = $row2['food'];
    $price = $row2['price'];
    $qty = $row2['qty'];
    $Status = $row2['Status'];
    $Customer_name = $row2['Customer_name'];
    $Customer_contact = $row2['Customer_contact'];
    $Customer_Email = $row2['Customer_Email'];
    $Customer_Address = $row2['Customer_Address'];
    ?>
    <?php

} else {
    header('location' . SITEURL . 'admin/manage-order.php');

}


?>

           <form action='' method='post' >
        <table class="table-30">
                <tr>
                    <td>Food Name: </td>
                    <td><?php echo $food ?></td>
                </tr>
                <tr>
                    <td>Qty: </td>
                    <td>
                        <?php echo $qty ?> 
                </td>
                </tr>
                <tr>
                    <td>Status: </td>
                    <td>
                    
<select name='status' >
<option <?php if ($Status == 'Ordered') {
            echo 'selected';
        } ?> value='Ordered'>Ordered</option>
<option <?php if ($Status == 'On Delevery') {
            echo 'selected';
        } ?> value='On Delevery'>On Delevery</option>
<option <?php if ($Status == 'Delivered') {
            echo 'selected';
        } ?> value='Delivered'>Delivered</option>
<option <?php if ($Status == 'Canceled') {
            echo 'selected';
        } ?> value='Canceled'>Canceled</option>
</select>

                </td>
                </tr>
                <tr>
                    <td>Customer Name: </td>
                    <td>
                        <?php echo $Customer_name ?> 
                </td>
                </tr>
                <tr>
                    <td>Customer Email: </td>
                    <td>
                    <?php echo $Customer_Email ?>
                </td>
                </tr>
                <tr>
                    <td>Customer Address: </td>
                    <td>
                    <?php echo $Customer_Address ?>
                </td>
                </tr>
                <tr>
                    <td class='col-2'>
                        <input type="submit" name="submit" class="btn-secondary"  value="Update Order">
                </td>
                </tr>
            </table>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $status = $_POST['status'];

            $sql3 = "UPDATE `tbl_order` SET `Status`='$status' WHERE id=$id";
            $res3 = mysqli_query($conn, $sql3);
            if ($res3) {
                $_SESSION['updateSuccess'] = "<div class='sucess'>Updated Successfully</div>";
                header('location' . SITEURL . 'admin/manage-order.php');
            } else {
                $_SESSION['updatefailed'] = "<div class='error'>Update failed</div>";
                header('location' . SITEURL . 'admin/update-order.php');

            }

        } else {
            header('location' . SITEURL . 'admin/manage-order.php');

        }

        ?>
    </div>
</div>


<?php include('partials/footer.php'); ?>