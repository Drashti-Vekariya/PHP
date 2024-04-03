<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>KANKU</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/fontAwesome.css">
    <link rel="stylesheet" href="css/hero-slider.css">
    <link rel="stylesheet" href="css/owl-carousel.css">
    <link rel="stylesheet" href="css/style.css">


    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body>
    <?php include("header.php");
    if (!isset($_SESSION['u_id'])) {
        $u_id = "";
    } else {
        $u_id = $_SESSION['u_id'];
    }

    $cart_rows_number = 0;
    $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$u_id'") or die('query failed');
    $cart_rows_number = mysqli_num_rows($select_cart_number);

    ?>
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row w-100">
                <div class="col-lg-12 col-md-12 col-12">
                    <h3 class="display-5 mb-2 text-center">Shopping Cart</h3>
                    <p class="mb-5 text-center">
                    <b><?php echo $cart_rows_number; ?></b> items in your cart
                    </p>
                    <?php
                    $sub_total = 0;
                    include("config.php");
                    if (isset($_SESSION['u_id'])) {
                        ?>
                        <table id="shoppingCart" class="table table-condensed table-responsive">
                            <thead>
                                <tr>
                                    <th style="width:60%">Product</th>
                                    <th style="width:12%">Price</th>
                                    <th style="width:10%">Quantity</th>
                                    <th style="width:16%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $u_id = $_SESSION['u_id'];
                                $sql = "SELECT * FROM `cart` WHERE user_id = '$u_id'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // Loop through each row and print the product data
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $cart_id = $row['cart_id'];
                                        $p_id = $row["p_id"];
                                        $p_name = $row["p_name"];
                                        $p_img = $row["p_img"];
                                        $qty = $row['qty'];
                                        $p_price = $row["p_price"];
                                        $p_desc = $row["p_desc"];

                                        if (isset($_POST['update_qty_' . $p_id])) {
                                            $new_qty = $_POST['qty_' . $p_id];
                                            mysqli_query($conn, "UPDATE `cart` SET `qty` = '$new_qty' WHERE `cart_id` = '$cart_id'") or die('query failed');
                                            echo "<script>alert('Quantity updated');";
                                            echo "window.location.href ='cart.php'</script>";
                                        }

                                        if (isset($_POST['delete_' . $p_id])) {
                                            $delete_id = $cart_id;
                                            mysqli_query($conn, "DELETE FROM `cart` WHERE `cart_id` = '$delete_id'") or die('query failed');
                                            echo "<script>alert('product remove form the cart');";
                                            echo "window.location.href ='cart.php'</script>";
                                        }

                                        ?>
                                        <tr>
                                            <td data-th="Product">
                                                <div class="row">
                                                    <div class="col-md-3 text-left">
                                                        <img src="img\<?php echo $p_img; ?>" alt=""
                                                            class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                                    </div>
                                                    <div class="col-md-9 text-left mt-sm-2">
                                                        <h4>
                                                            <?php echo $p_name; ?>
                                                        </h4>
                                                        <!-- <p class="font-weight-light">Brand &amp; Name</p> -->
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-th="Price">
                                                <h4>₹
                                                    <?php echo $p_price * $qty; ?>
                                                </h4>
                                            </td>
                                            <?php $sub_total = $sub_total + ($p_price * $qty); ?>
                                            <td data-th="Quantity">
                                                <form action="" method="post">
                                                    <input type="number" class="form-control form-control-lg text-center"
                                                        value="<?php echo $qty; ?>" min="1" max="10" name="qty_<?php echo $p_id; ?>">
                                            </td>
                                            <td class="actions" data-th="Operation">
                                                <div class="text-left">
                                                    <button class="btn btn-white border-secondary bg-white btn-md mb-2"
                                                        value="update" name="update_qty_<?php echo $p_id; ?>">
                                                        <i class="fa fa-refresh" aria-hidden="true"></i>
                                                    </button>
                                                    <button class="btn btn-white border-secondary bg-white btn-md mb-2"
                                                        value="delete" name="delete_<?php echo $p_id; ?>">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "Your cart is empty";
                                }
                    }
                    ?>
                        </tbody>
                    </table>
                    <div class="float-right text-right">
                        <h4>Subtotal:</h4>
                        <h1>₹
                            <?php echo $sub_total; ?>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="row mt-4 d-flex align-items-right" style="margin-top:20px">
                <div class="col-sm-6 order-md-2 text-right" style="margin-left:600px">
                    <a href="checkout.php?sub_total=<?php echo $sub_total; ?>" class="btn btn-danger mb-4 btn-lg pl-5 pr-5">Checkout</a>
                </div>
                <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left " style="margin-left:-1200px">
                    <a href="products.php" class="btn btn-danger mb-4 btn-lg pl-5 pr-5">Continue Shopping</a>
                </div>
            </div>
        </div>
    </section>

    <?php include("footer.php"); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/datepicker.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>

</html>