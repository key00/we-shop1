<?php

session_start();
include("functions/functions.php");
include("includes/db.php");

?>

<?php

if (isset($_GET['pro_id'])) {
    $pro_id = $_GET['pro_id'];
    $get_product = "select * from product where pro_id='$pro_id'";
    $run_product = mysqli_query($con, $get_product);
    $row_product = mysqli_fetch_array($run_product);
    $cat_id = $row_product['cat_id'];
    $pro_name = $row_product['pro_name'];
    $pro_price = $row_product['price'];
    $pro_desc = $row_product['description'];
    $pro_img1 = $row_product['product_img1'];
    $pro_img2 = $row_product['product_img2'];
    $get_cat = "select * from categories where cat_id='$cat_id'";
    $run_cat = mysqli_query($con, $get_cat);
    $row_cat = mysqli_fetch_array($run_cat);
    $cat_name = $row_cat['cat_name'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>We-Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <link rel="stylesheet" href="../style.css" />
</head>

<body>

    <!-- nav start -->

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a href="../home.php" class="navbar-brand">WE-SHOP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item px-2 ">
                        <a href="../home.php" class="nav-link <?php if ($active == 'Home') echo "active" ?>">Home</a>
                    </li>

                    <li class="nav-item px-2">
                        <a href="../shop.php" class="nav-link <?php if ($active == 'Shop') echo "active" ?>">Shop</a>
                    </li>

                    <li class="nav-item px-2">
                        <a href="../cart.php" class="nav-link <?php if ($active == 'cart') echo "active" ?>">
                            <span><i class="fa-solid fa-cart-shopping"></i> <sup><?php cart_items(); ?></sup></span></a>
                    </li>

                    <li class="nav-item px-2">
                        <a href="../register.php" class="nav-link <?php if (isset($_SESSION['username'])) echo "active-session";
                                                                    elseif ($active == "register") echo "active" ?>">Register</a>
                    </li>

                    <li class="nav-item px-2">
                        <a href="../signin.php" class="nav-link <?php if (isset($_SESSION['username'])) echo "active-session";
                                                                elseif ($active == "signin") echo "active"
                                                                ?>">LOGIN</a>
                    </li>


                    <li class="nav-item px-2">
                        <a href="../users/personal.php" class="nav-link <?php if (!isset($_SESSION['username'])) echo "active-session";
                                                                        elseif ($active == "personal") echo "active"; ?>">My account</a>
                    </li>
                    <li class="nav-item px-2">
                        <?php
                        if (isset($_SESSION['username'])) {

                            echo "
                            <a href='../logout.php' class='btn btn-secondary'>LOGOUT</a>";
                        }
                        ?>
                    </li>


                </ul>
            </div>
        </div>
    </nav>

    <!-- Nav End -->