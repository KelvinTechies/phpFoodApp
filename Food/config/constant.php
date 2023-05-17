<?php
// Start Session
session_start();
// creating constants to store Non-repeating Values
define('SITEURL', 'http://localhost/food/web-design-course-restaurant/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'FoodApp');


$conn= mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD)or die(mysqli_error());

$dbSelect = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

?>