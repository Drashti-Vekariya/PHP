<?php 
session_start();
?>
<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button id="primary-nav-button" type="button">Menu</button>
                <a href="index.html">
                    <div class="logo">
                        <img src="img/kankuLogo.svg" alt="" height="100px">
                    </div>
                </a>
                <nav id="primary-nav" class="dropdown cf">
                    <ul class="dropdown menu">
                        <li class='active'><a href="index.php">Home</a></li>

                        <li>
                            <a href="#">Products</a>
                            <ul class="sub-menu">
                                <li><a href="products.php">All Products</a></li>
                                <li><a href="eyes.php">EYES</a></li>
                                <li><a href="lips.php">LIPS</a></li>
                                <li><a href="nails.php">NAILS</a></li>
                                <li><a href="face.php">FACE</a></li>
                                <li><a href="brush.php">BRUSH & TOOLS</a></li>
                                <li><a href="skin care.php">SKIN CARE</a></li>
                            </ul>
                        </li>
                        <!-- <li><a href="checkout.php">Checkout</a></li> -->

                        <li>
                            <a href="#">About</a>
                            <ul class="sub-menu">
                                <li><a href="about-us.php">About Us</a></li>
                                <!-- <li><a href="blog.php">Blog</a></li> -->
                                <li><a href="testimonials.php">Testimonials</a></li>
                                <li><a href="terms.php">Terms</a></li>
                            </ul>
                        </li>

                        <li><a href="contact.php">Contact Us</a></li>
                    
                        <li><a href="wishlist.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-heart" viewBox="0 0 16 16" >
                                    <path
                                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                </svg>
                            </a>
                        </li>
                    
                        <li><a href="cart.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                    class="bi bi-cart" viewBox="0 0 16 16" style="margin-left:-45px">
                                    <path
                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                            </a>
                        </li>

                        <?php 
                        include 'config.php';
                        if(isset($_SESSION['u_id'])){
                        ?>
                        <li><a href="profile.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor"
                                    class="bi bi-person" viewBox="0 0 15 15" style="margin-left:-70px">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                </svg>
                            </a>
                        </li> 
                        <?php } else { ?>

                            <li><a href="login_form.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor"
                                    class="bi bi-person" viewBox="0 0 15 15" style="margin-left:-70px">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                </svg>
                            </a>
                        </li>
                        <?php } ?>

                    </ul>
                </nav><!-- / #primary-nav -->
            </div>
        </div>
    </div>
</header>