<?php 
    $dataLink = "double";

    include "./functions/init.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>FoodSave - view</title>

<!-- Fav Icon -->
<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,400;0,9..144,500;0,9..144,600;0,9..144,700;0,9..144,800;0,9..144,900;1,9..144,300;1,9..144,400;1,9..144,500;1,9..144,600;1,9..144,700;1,9..144,800;1,9..144,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<!-- Stylesheets -->
<link href="assets/css/font-awesome-all.css" rel="stylesheet">
<link href="assets/css/flaticon.css" rel="stylesheet">
<link href="assets/css/owl.css" rel="stylesheet">
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/jquery.fancybox.min.css" rel="stylesheet">
<link href="assets/css/animate.css" rel="stylesheet">
<link href="assets/css/nice-select.css" rel="stylesheet">
<link href="assets/css/elpath.css" rel="stylesheet">
<link href="assets/css/color/theme-color.css" id="jssDefault" rel="stylesheet">
<link href="assets/css/switcher-style.css" rel="stylesheet">
<link href="assets/css/rtl.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/module-css/page-title.css" rel="stylesheet">
<link href="assets/css/module-css/news.css" rel="stylesheet">
<link href="assets/css/module-css/sidebar.css" rel="stylesheet">
<link href="assets/css/module-css/blog-details.css" rel="stylesheet">
<link href="assets/css/responsive.css" rel="stylesheet">

</head>


<!-- page wrapper -->
<body>

    <div class="boxed_wrapper ltr">


        <!--Search Popup-->
        <?php include "./includes/search.php"; ?>


        <!-- main header -->
            <?php include "./includes/header.php"; ?>
        <!-- main-header end -->


 

        <!-- page-title -->
        <section class="page-title p_relative centred">
            <div class="bg-layer" style="background-image: url(assets/images/background/page-title.jpg);"></div>
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url(assets/images/shape/shape-14.png);"></div>
                <div class="pattern-2" style="background-image: url(assets/images/shape/shape-14.png);"></div>
                <div class="pattern-3 rotate-me" style="background-image: url(assets/images/shape/shape-15.png);"></div>
                <div class="pattern-4 float-bob-y" style="background-image: url(assets/images/shape/shape-16.png);"></div>
            </div>
            <div class="auto-container">
                <div class="content-box">
                    <h1>Food View</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.html">Home</a></li>
                        <li>Food view</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page-title end -->


        <!-- sidebar-page-container -->
        <section class="sidebar-page-container blog-details pt_150 pb_150">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="blog-details-content">
                        <?php 

                            $FoodSelected = (isset($_GET["id"])) ? $_GET["id"] : 1;

                            $sql = "SELECT food_listing_tbl.*, category_tbl.* FROM
                             `food_listing_tbl` left JOIN category_tbl on food_listing_tbl.category_id = category_tbl.id where  food_listing_tbl.deleted = 0 and food_listing_tbl.id='".$FoodSelected."'";

                            $result = mysqli_query($conn,$sql);

                            $FoodData = (mysqli_num_rows($result) > 0) ? mysqli_fetch_all($result) : array();

                            // $ListedFoodData = array(1,3,4,5,5,2);

                            //  print_r($FoodData);

?>
                            <div class="news-block-one">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><img src="./uploads/<?php echo $FoodData[0][7] ; ?>" alt=""></figure>
                                        <div class="post-date"><h3><?php echo time_elapsed_string($FoodData[0][10]) ; ?></h3></div>
                                    </div>
                                    <div class="lower-content">
                                        <ul class="post-info mb_6 clearfix">
                                            <li><i class="icon-24"></i><a href="#"><?php echo $FoodData[0][17] ; ?></a></li>
             
                                        </ul>
                                        <h3><?php echo $FoodData[0][3] ; ?></h3>
                                        <p><?php echo $FoodData[0][18] ; ?></p>
                                        
                                        <blockquote>
                                            <div class="icon-box"><i class="icon-42"></i></div>
                                            <p><?php echo $FoodData[0][12] ; ?></p>
                                            <h4><?php echo $FoodData[0][5].", ".$FoodData[0][4]."." ; ?></h4>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="comment-box mb_65">
                                <div class="group-title">
                                    <h3>Blog posted under this food list</h3>
                                </div>
                                <div class="comment-inner">

                                    <?php
                                        $sql = "SELECT  *  FROM `blog_tbl` WHERE deleted = 0 and food_id = '".$FoodSelected."'";

                                        $result = mysqli_query($conn,$sql);

                                        $blogData = (mysqli_num_rows($result) > 0) ? mysqli_fetch_all($result) : array();

                                        // print_r($blogData);

                                        foreach($blogData as $commnt => $value) {
                                    ?>
                                    <div class="comment">
                                        <figure class="comment-thumb"><img src="./uploads/<?php echo $blogData[$commnt][5] ; ?>" alt=""></figure>
                                        <h4><?php echo $blogData[$commnt][1] ; ?></h4>
                                        <span class="post-date"><?php echo time_elapsed_string($blogData[$commnt][6]) ; ?></span>
                                        <p><?php echo substr($blogData[$commnt][4],0,100 )."..."; ?></p>
                                        <a href="blog-details.php?id=<?php echo  $blogData[$commnt][0] ; ?>">view</a>
                                       
                                    </div>
                                    
                                    <?php
                                                        }
                                    ?>
                                   
                                </div>
                            </div>
                          
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="blog-sidebar default-sidebar ml_40">
                           
                          
                            <div class="sidebar-widget post-widget">
                                <div class="widget-title">
                                    <h3>Recipient Reviews</h3>
                                </div>
                                <div class="post-inner">
                                <?php 

                                        $sql = "SELECT  *  FROM `feedback_tbl` WHERE deleted = 0 and food_id = '".$FoodSelected."'";

                                        $result = mysqli_query($conn,$sql);

                                        $FoodDataReview = (mysqli_num_rows($result) > 0) ? mysqli_fetch_all($result) : array();

                                        // $ListedFoodData = array(1,3,4,5,5,2);

                                        // print_r($FoodDataReview);

                                        foreach($FoodDataReview as $reviewData => $value) {
                                    ?>
                                    <div class="post">
                                        <figure class="post-thumb"><?php echo  $FoodDataReview[$reviewData][3] ; ?> Star</figure>
                                        <h5><a href="#"><?php echo  $FoodDataReview[$reviewData][4] ; ?></a></h5>
                                        <span class="post-date"><?php echo explode(" ",$FoodDataReview[$reviewData][5])[0] ; ?></span>
                                    </div>
                                            
                                    <?php
                                        }
                                    ?>
                                   
                                </div>
                            </div>
                            <div class="sidebar-widget post-widget">
                                <div class="widget-title">
                                    <h3>Recipient Schedules</h3>
                                </div>
                                <div class="post-inner">
                                <?php 

                                        $sql = "SELECT  schedule_tbl.*,user_tbl.*  FROM `schedule_tbl` LEFT JOIN user_tbl on schedule_tbl.user_id = user_tbl.id WHERE schedule_tbl.deleted = 0 and schedule_tbl.food_id = '".$FoodSelected."'";

                                        $result = mysqli_query($conn,$sql);

                                        $FoodDataschedule = (mysqli_num_rows($result) > 0) ? mysqli_fetch_all($result) : array();

                                        // $ListedFoodData = array(1,3,4,5,5,2);

                                        // print_r($FoodDataschedule);

                                        foreach($FoodDataschedule as $reviewData => $value) {
                                    ?>
                                    <div class="post">
                                        <figure class="post-thumb"><?php echo  $FoodDataschedule[$reviewData][3] ; ?> </figure>
                                        <h5><a href="#">Type: <?php echo  $FoodDataschedule[$reviewData][3] ; ?></a></h5>
                                        <h5><a href="#">Date: <?php echo  $FoodDataschedule[$reviewData][14] ; ?></a></h5>
                                        <span class="post-date">Location : <?php echo $FoodDataschedule[$reviewData][6].", ".$FoodDataschedule[$reviewData][5]."." ; ?></span> <br>
                                        <span class="post-date"><?php echo explode(" ",$FoodDataschedule[$reviewData][7])[0] ; ?></span>
                                    </div>
                                            
                                    <?php
                                        }
                                    ?>
                                   
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- sidebar-page-container end -->


        <!-- main-footer -->
            <?php
                include "./includes/footer.php";
            ?>
        <!-- main-footer -->



        <!--Scroll to top-->
        <div class="scroll-to-top">
            <div>
                <div class="scroll-top-inner">
                    <div class="scroll-bar">
                        <div class="bar-inner"></div>
                    </div>
                    <div class="scroll-bar-text">Go To Top</div>
                </div>
            </div>
        </div>
        <!-- Scroll to top end -->
        
    </div>


    <!-- jequery plugins -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/validation.js"></script>
    <script src="assets/js/jquery.fancybox.js"></script>
    <script src="assets/js/appear.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/parallax-scroll.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jQuery.style.switcher.min.js"></script>

    <!-- main-js -->
    <script src="assets/js/script.js"></script>

</body><!-- End of .page_wrapper -->
</html>
