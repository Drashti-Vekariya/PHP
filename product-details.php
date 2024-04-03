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

    <div class="wrap">
        <?php include("header.php"); ?>
    </div>

    <section class="featured-places">

        <?php
        include("config.php");
        // SQL query to fetch data
        $p_id = $_GET['p_id'];
        $sql = "SELECT * FROM products where p_id=$p_id";

        // Execute the query
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Loop through the rows of the result
            while ($row = $result->fetch_assoc()) {
                // Access individual columns using the column name
                $p_id = $row['p_id'];
                $p_name = $row['p_name'];
                $p_img = $row['p_img'];
                $p_mrp = $row['p_mrp'];
                $p_price = $row['p_price'];
                $p_desc = $row['p_desc'];

                ?>

                <section class="banner banner-secondary" id="top"
                    style="background-color:rgba(255, 0, 0, 0.66); margin-top:-80px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="banner-caption">
                                    <h3 style="color:white; text-align:center;">
                                        <?php echo $p_name; ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="container" style="margin-top:20px;">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">

                            <div>
                                <img src="img\<?php echo "$p_img"; ?>" alt="" class="img-responsive wc-image">
                            </div>
                        </div>

                        <div class="col-md-6 col-xs-12">
                            <form action="#" method="post" class="form">
                                <h3>
                                    <?php echo "$p_name"; ?>
                                </h3>

                                <h2><small><del>₹
                                            <?php echo $p_mrp ?>
                                        </del></small><strong class="text-danger">₹
                                        <?php echo $p_price ?>
                                    </strong></h2>

                                <br>

                                <p class="lead">
                                    <?php echo $p_desc ?>
                                </p>

                                <br>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label">Quantity</label>

                                        <div class="form-group">
                                            <input type="number" name="qty" class="form-control" value="1" min="1" max="5"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="blue-button">

                                    <?php
                                    if (!isset($_SESSION['u_id'])) { ?>


                                        <input type="submit" value="Add to Cart" name="noLogin">
                                        <input type="submit" value="❤" name="noWish">

                                    <?php }

                                    if (isset($_SESSION['u_id'])) { ?>

                                        <input type="submit" value="Add to Cart" name="addtocart">
                                        <input type="submit" value="❤" name="wishlist">

                                    <?php } ?>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {

            echo "No data found.";
        }
        mysqli_free_result($result);
        mysqli_close($conn);

        include 'config.php';
        if (isset($_POST['noWish'])) {
            echo '<script>alert("Please login to add product in wishlist");</script>';
        }

        if (isset($_POST['noLogin'])) {
            echo '<script>alert("Please login to purchase product");</script>';
        }

        if (isset($_POST['addtocart'])) {
            $p_id = $_GET['p_id'];
            $sql = "SELECT * FROM products where p_id=$p_id;";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                // Loop through each row and print the product data
                while ($row = mysqli_fetch_assoc($result)) {
                    $u_id = $_SESSION['u_id'];
                    $p_id = $row["p_id"];
                    $p_name = $row["p_name"];
                    $p_img = $row["p_img"];
                    $qty = $_POST['qty'];
                    $p_price = $row["p_price"];
                    $p_desc = $row["p_desc"];

                    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE p_id='$p_id' AND user_id='$u_id'") or die('query failed');
                }
            }
            if (mysqli_num_rows($check_cart_numbers) > 0) {
                echo '<script>alert("already added to cart!");</script>';
            } else {
                mysqli_query($conn, "INSERT INTO cart (user_id,p_id,p_name,p_img,p_price,p_desc,qty) 
                VALUES('$u_id','$p_id','$p_name','$p_img','$p_price',\"$p_desc\",'$qty')");

                echo '<script>alert("product added to cart");';
                echo "window.location.href ='cart.php'</script>";
            }
        }

        if (isset($_POST['wishlist'])) {
            $p_id = $_GET['p_id'];
            $sql = "SELECT * FROM products where p_id=$p_id;";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                // Loop through each row and print the product data
                while ($row = mysqli_fetch_assoc($result)) {
                    $u_id = $_SESSION['u_id'];
                    $p_id = $row["p_id"];
                    $p_name = $row["p_name"];
                    $p_img = $row["p_img"];
                    $qty = $row["qty"];
                    $p_price = $row["p_price"];
                    $p_desc = $row["p_desc"];

                    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE p_id = '$p_id' AND user_id = '$u_id'") or die('query failed');
                }
            }
            if (mysqli_num_rows($check_cart_numbers) > 0) {
                echo '<script>alert("already added to your wishlist!");</script>';
            } else {
                mysqli_query($conn, "INSERT INTO `wishlist`(user_id, p_id, p_name, p_img, p_price, p_desc, qty) VALUES
('$u_id', '$p_id', '$p_name', '$p_img', '$p_price',\"$p_desc\", '$qty')") or die('query failed');
                echo '<script>alert("product added to your wishlist!");';
                echo "window.location.href ='wishlist.php'</script>";
            }
        }

        ?>

        </form>
        </div>
        </div>
        </div>
        </div>


        <?php include("footer.php"); ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/datepicker.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
</body>

</html>