<?php include ('./partials-front/menu.php')?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
<?php 
$sql ="SELECT * FROM tbl_category WHERE Active= 'Yes'  Limit 3";
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