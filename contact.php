<?php 
include_once('includes/config.php');

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $sub = $_POST['subject'];
        $msg = $_POST['message'];
        
        $sql = mysqli_query($con, "INSERT INTO `contact`(`name`, `subject`, `message`) VALUES('$name','$sub','$msg')");
        
        if ($sql) {
            echo "<script>alert('Message Sent Successfully');</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
        }
        echo "<script>window.location.href='contact.php'</script>";
    }
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

    <section class="banner banner-secondary" id="top" style="background-color:rgba(255, 0, 0, 0.66);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                    <h3 style="color:white; text-align:center;">Contact Us</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="popular-places">
            <div class="container">
                <div class="contact-content">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="left-content">
                                <div class="row">
                                <form method="post" action="contact.php">
                                    <div class="col-md-6">
                                        
                                        
                                            <input name="name" type="text" class="form-control" id="name"
                                                placeholder="Your name..." required>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        
                                            <input name="subject" type="text" class="form-control" id="subject"
                                                placeholder="Subject..." required>
                                        
                                    </div>
                                    <div class="col-md-12">
                                        
                                            <textarea name="message" rows="6" class="form-control" id="message"
                                                placeholder="Your message..." required></textarea>
                                        
                                    </div>
                                    <div class="col-md-12">
                                        
                                            <div class="blue-button">
                                                <input type="submit" name="submit" value="Send Message"/>
                                            </div>
                                        
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="right-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="content">
                                            <p>Contact us and visit our store.</p>
                                            <ul>
                                                <li><span>Phone:</span><a href="#">+91 94271 06916</a></li>
                                                <li><span>Email:</span><a href="#">contact@kanku.com</a></li>
                                                <li><span>Address:</span><i class="fa fa-map-marker"></i> kanku, HariRoad, Amreli, Gujarat</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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