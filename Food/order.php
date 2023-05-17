<?php include('./partials-front/menu.php') ?>
    <!-- fOOD sEARCH Section Starts Here -->
    <?php
if(isset($_SESSION['orderdFailed'])){
    echo $_SESSION['orderdFailed'];
    unset($_SESSION['orderdFailed']);
}
    ?>
    <?php
    if (isset($_GET['food_id'])) {
        $food_id = $_GET['food_id'];

        $sql = "SELECT * FROM tbl_food WHERE id= $food_id";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count == 1){

            $row = mysqli_fetch_assoc($res);

            $Title=$row['Title'];
            $Price=$row['Price'];
        }else{
        header('loaction:' . SITEURL);            
        }
    } else {
        header('loaction:' . SITEURL);
    }


    ?>

    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" class="order" method='post'>
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $Title ?></h3>
                        <input type="hidden" name="food" class="input-responsive" value="<?php echo $Title ?>" required>                                                
                        <p class="food-price">$<?php echo $Price ?></p>
                        <input type="hidden" name="price" class="input-responsive" value="<?php echo $Price ?>" required>                        

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="fullname" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="fone" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>
<?php   
if(isset($_POST['submit'])){
$fullname=$_POST['fullname'];
$fone=$_POST['fone'];
$email=$_POST['email'];
$address=$_POST['address'];
$qty=$_POST['qty'];
$price=$_POST['price'];
$food=$_POST['food'];

$total= $qty * $price;
$order_date = date('Y-m-d h:i:sa');
$status ='Ordered'; 

$sql2 = "INSERT INTO `tbl_order`( `food`, `price`, `qty`, `total`, `Order_date`, `Status`, `Customer_name`, `Customer_contact`, `Customer_Email`, `Customer_Address`) VALUES ('$food','$price','$qty','$total','$order_date','$status','$fullname','$fone','$email','$address')";
$res2 = mysqli_query($conn, $sql2);

if($res2){
$_SESSION['orderd'] ="<div class='success'>Ordered Placed Successfully</div>";
header('location:'.SITEURL);
}else{
    $_SESSION['orderdFailed'] ="<div class='error'>Ordered Failed</div>";
header('location:'.SITEURL.'order.php');
    

}
}

?>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->
    <?php include('./partials-front/footer.php') ?>