<?php include ('./partials-front/menu.php')?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
<?php
if(isset($_SESSION['orderd'])){
    echo $_SESSION['orderd'];
    unset($_SESSION['orderd']);
}
?>
           <?php 
$sql ="SELECT * FROM tbl_category WHERE Active= 'Yes' AND Featured ='Yes' Limit 3";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if($count > 0){
    while($row=mysqli_fetch_assoc($res)){
        $id = $row['id'];
        $Title = $row['Title'];
        $ImageName = $row['ImageName'];
        ?>
            <a href="<?php echo SITEURL;?>category-foods.php?category_id=<?php echo $id ?>">
            <div class="box-3 float-container">
                <img src="images/pizza.jpg" alt="Pizza" class="img-responsive img-curve">

                <h3 class="float-text text-white"><?php echo $Title ?></h3>
            </div>
            </a>
        <?php
    }
}else{
    echo "<div class='error'>No Categories Available</div>";
}
?>

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
<?php
$sql2 ="SELECT * FROM tbl_food WHERE Active= 'Yes' AND Featured='Yes'  Limit 3";
$res2 = mysqli_query($conn, $sql2);
$count2 = mysqli_num_rows($res2);
if($count2 > 0){

    while($food=mysqli_fetch_assoc($res2)){
        $Foodid=$food['id'];
        $Title=$food['Title'];
        $Price=$food['Price'];
        $Description=$food['Description'];
        $ImageName=$food['ImageName'];
        ?>
   <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $Title ?></h4>
                    <p class="food-price">$<?php echo $Price ?></p>
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

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
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

<?php include('partials-front/footer.php');?>