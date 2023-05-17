<?php include ('./partials-front/menu.php')?>
<?php
$search = mysqli_real_escape_string($conn, $_POST['search']);

?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
<?php


$sql = "SELECT * FROM tbl_food WHERE Title LIKE '%$search%' OR Description LIKE '%$search%'";
$res = mysqli_query($conn, $sql);

$count = mysqli_num_rows($res);

if($count > 0){

    while($row = mysqli_fetch_assoc($res)){
        $id=$row['id'];
        $Title=$row['Title'];
        $Description=$row['Description'];
        $Price=$row['Price'];
        ?>
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $Title ?></h4>
                    <p class="food-price"><?php echo $Price ?></p>
                    <p class="food-detail">
                        <?php echo $Description ?>
                    </p>
                    <br>

 <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $Foodid ?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>
        <?php
    }
}else{
    echo "<div class='error'>No Food Available</div>";
    
}


?>


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

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

<?php include ('./partials-front/footer.php')?>
