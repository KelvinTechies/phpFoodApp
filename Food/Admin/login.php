<?php include('../config/constant.php'); ?>

<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Food Order</title>
    <link rel="stylesheet" href="../css/admin.css">
    

</head>
<body>
    <div class="login">
        <h1 class='text-center'>Login</h1>
        <br>
        <br>
        <?php

        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);

        }

        ?>
        
    <form action="" class='text-center' method="Post">
        UserName:
        <input type='text' name="username" placeholder="Enter Your Username">
        <br>
        <br>
        
        Password:
        <input type='password' name="pwd" placeholder="Enter Your password">
        <br>
        <br>
        <button type='submit'class='btn-primary' name='login'>Login</button>

    </form>
        <p class='text-center'>Created By- <a href="">Osas</p>
    </div>
</body>
</html>

<?php

if (isset($_POST['login'])) {
    $username =  mysqli_real_escape_string($conn,$_POST['username']);
    $raw_pwd = md5($_POST['pwd']);

    $pwd=mysqli_real_escape_string($conn, $raw_pwd);

    $sql = "SELECT * FROM `tbl_admin` WHERE UserName = '$username' AND Password ='$pwd'";

    $res = mysqli_query($conn, $sql);

    $data = mysqli_num_rows($res);

    if ($data >= 1) {
        $_SESSION['user'] = $username;
        $_SESSION['login'] = "<div class='success'>Logged in Successfully</div>";
        header('location:' . SITEURL . 'admin/');

    } else {
        $_SESSION['login'] = "<div class='error text-center'>Username or Password not matched</div>";
        header('location:' . SITEURL . 'admin/login.php');

    }
}

?>