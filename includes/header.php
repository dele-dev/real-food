<header class="main-header header-style-two">
            <!-- header-lower -->
            <div class="header-lower">
                <div class="outer-box">
                    <div class="logo-box">
                        <figure class="logo"><a href="index.php"><img src="assets/images/logo-2.png" alt=""></a></figure>
                    </div>
                    <div class="menu-area">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler">
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                        </div>
                        <nav class="main-menu navbar-expand-md navbar-light clearfix">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <?php 
                                    $user_logged_in = (isset($_SESSION["user_id"])) ? true : false;
                                    
                                ?>
                                <ul class="navigation clearfix">
                                    <li class="current "><a href="index.php">Home</a>
                                       
                                    </li> 

                                    <?php 
                                        if ($user_logged_in == true ) {
                                    ?>

                                    <li class=""><a href="findFood.php"><?php echo ($_SESSION["user_type"] == 1 ) ?  'Find Food' : 'List Food' ?> </a>
                                      
                                    </li> 

                                   

                                    <?php 
                                        }else{

                                            ?>
                                             <li class=""><a href="findFood.php">Find  Food</a>
                                            <?php
                                        }
                                    ?>
                                   
                                    <li class=""><a href="blog.php">Blog</a>
                                       
                                    </li>  
                                    <li class=""><a href="contact.php">Contact us</a>
                                       
                                    </li>  

                                    <?php echo ($user_logged_in == true ) ? '<li class=""><a href="profile.php"><span style="border: 1px solid;padding: 5px;border-radius: 50%;color: #b1cd5c;" id="notification">Me </span></a></li>' : ''; ?>  
                                    
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <ul class="menu-right-content">
                        <li class="support-box">
                            <i class="icon-4"></i>
                            <a href="tel:2395432170108">(239)-543-217-0108</a>
                        </li>
                        
                        <li class="btn-box">

                            <a href="<?php echo ($user_logged_in == true ) ? 'schedule.php' : './auth'; ?>" class="theme-btn btn-one"><span>Food Schedule</span></a>
                        </li>
                    </ul>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="outer-container">
                    <div class="outer-box">
                        <div class="logo-box">
                            <figure class="logo"><a href="index.php"><img src="assets/images/logo.png" alt=""></a></figure>
                        </div>
                        <div class="menu-area">
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                            <ul class="menu-right-content">
                                <li class="support-box">
                                    <i class="icon-4"></i>
                                    <a href="tel:2395432170108">(239)-543-217-0108</a>
                                </li>
                               
                                <li class="btn-box">
                                <a href="<?php echo ($user_logged_in == true ) ? 'schedule.php' : './auth'; ?>" class="theme-btn btn-one"><span>Food Schedule</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>



                <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="index.php"><img src="assets/images/logo-2.png" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                <div class="contact-info">
                    <h4>Contact Info</h4>
                    <ul>
                        <li>Chicago 12, Melborne City, USA</li>
                        <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                        <li><a href="mailto:info@example.com">info@example.com</a></li>
                    </ul>
                </div>
                <div class="social-links">
                    <ul class="clearfix">
                        <li><a href="index.php"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="index.php"><span class="fab fa-facebook-square"></span></a></li>
                        <li><a href="index.php"><span class="fab fa-pinterest-p"></span></a></li>
                        <li><a href="index.php"><span class="fab fa-instagram"></span></a></li>
                        <li><a href="index.php"><span class="fab fa-youtube"></span></a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End Mobile Menu -->