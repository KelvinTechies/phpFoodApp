<?php include ('./partials-front/menu.php')?>
    <!-- fOOD sEARCH Section Starts Here -->

    <?php

    if(isset($_GET['category_id'])){
        $category_id=$_GET['category_id'];
        $sql = "SELECT Title from tbl_category WHERE id=$category_id";
        $res=mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($res);
        $Title= $row['Title'];
    }else{
        header('location:'. SITEURL);
    }

    ?>
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo $Title?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
<?php 
$sql2 = "SELECT * FROM tbl_food WHERE category_id=$category_id";

$res2 = mysqli_query($conn, $sql2);

$count2=mysqli_num_rows($res2);

if($count2 > 0){
while($row2 = mysqli_fetch_assoc($res2)){
    $id=$row2['id'];
    $Title=$row2['Title'];
    $Price=$row2['Price'];
    $Description=$row2['Description'];
    $ImageName=$row2['ImageName'];
    ?>
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $Title ?></h4>
                    <p class="food-price">$2<?php $Price ?></p>
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
    echo "<div class='error'>No Foods Available</div>";
    
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