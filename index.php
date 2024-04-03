<?php
@include 'config.php';
?>
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

    <section class="banner" id="top" style="background-image: url(img/homepage-banner-image-1920x700.png);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <!-- <div class="line-dec"></div> -->
                        <h2>Wellcome To KANKU.</h2>
                        <div class="blue-button">
                            <a href="products.php">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>


        <section class="featured-places">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <!-- <span>Featured Products</span> -->
                            <h2>Featured Products</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    include("config.php");
                    $sql = "SELECT * FROM products ORDER BY RAND() limit 3";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                            $p_id = $row['p_id'];
                            $p_name = $row['p_name'];
                            $p_img = $row['p_img'];
                            $p_mrp = $row['p_mrp'];
                            $p_price = $row['p_price'];
                            $p_desc = $row['p_desc'];

                            ?>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="featured-item">
                                    <div class="thumb">
                                        <img src="img\<?php echo "$p_img"; ?>" alt="">
                                    </div>
                                    <div class="down-content">
                                        <h4>
                                            <?php echo "$p_name"; ?>
                                        </h4>

                                        <span><del><sup>₹</sup>
                                                <?php echo "$p_mrp"; ?>
                                            </del> <strong><sup>₹</sup>
                                                <?php echo "$p_price"; ?>
                                            </strong></span>

                                        <!-- <p>
                                            <?php //echo "$p_desc"; ?>
                                        </p> -->

                                        <div class="text-button">
                                            <a href="product-details.php?p_id=<?php echo $p_id; ?>">Buy now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "No data found.";
                    }
                    ?>

                </div>
            </div>
        </section>

        <section class="featured-places">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <!-- <span>Categories</span> -->
                            <h2>Categories</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    include("config.php");
                    // SQL query to fetch data
                    $sql = "SELECT * FROM category";

                    // Execute the query
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Loop through the rows of the result
                        while ($row = $result->fetch_assoc()) {
                            // Access individual columns using the column name
                            $c_name = $row['c_name'];
                            $c_img = $row['c_img'];

                            ?>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="featured-item">
                                    <div class="thumb">
                                        <div class="">
                                            <img src="img/<?php echo $c_img; ?>"alt="">
                                        </div>
                                    </div>

                                    <div class="down-content">
                                        <div class="text-button">
                                            <a href="<?php echo $c_name; ?>.php">
                                                <h3>
                                                    <?php echo "$c_name"; ?>
                                                </h3>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {

                        echo "No data found.";
                    }
                    ?>
                </div>
            </div>
        </section>

        <section class="popular-places" id="popular">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <!-- <span>Testimonials</span> -->
                            <h2>Testimonials</h2>
                        </div>
                    </div>
                </div>

                <div class="owl-carousel owl-theme">
                    <?php
                    include("config.php");
                    // SQL query to fetch data
                    $sql = "SELECT * FROM testimonial limit 4";

                    // Execute the query
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Loop through the rows of the result
                        while ($row = $result->fetch_assoc()) {
                            // Access individual columns using the column name
                            $t_name = $row['name'];
                            $t_data = $row['testimonial_data'];
                            $t_img = $row['testimonial_img'];

                            ?>
                            <div class="item popular-item">
                                <div class="thumb">
                                    <img src="img/<?php echo $t_img; ?>" alt="">
                                    <div class="text-content">
                                        <h4>
                                            <?php echo "$t_name"; ?>
                                        </h4>
                                        <span>
                                            <?php echo "$t_data"; ?>
                                        </span>
                                    </div>
                                    <div class="plus-button">
                                        <a href="testimonials.php"><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {

                        echo "No data found.";
                    }
                    ?>

                </div>
            </div>
        </section>
    </main>

    <?php include("footer.php"); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/datepicker.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>

</html>