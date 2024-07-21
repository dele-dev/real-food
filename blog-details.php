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

<title>FoodSave - Blog details</title>

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
                    <h1>Blog Details</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.html">Home</a></li>
                        <li>Blog Details</li>
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

                            $blogSelected = (isset($_GET["id"])) ? $_GET["id"] : 1;

                            $sql = "SELECT user_tbl.fullname,blog_tbl.*, food_listing_tbl.* FROM `blog_tbl` LEFT JOIN user_tbl on blog_tbl.user_id = user_tbl.id 
                            right JOIN food_listing_tbl on blog_tbl.food_id = food_listing_tbl.id WHERE blog_tbl.deleted = 0 and blog_tbl.id='".$blogSelected."'";

                            $result = mysqli_query($conn,$sql);

                            $BlogData = (mysqli_num_rows($result) > 0) ? mysqli_fetch_all($result) : array();

                            // $ListedFoodData = array(1,3,4,5,5,2);

                            // print_r($BlogData);

?>
                            <div class="news-block-one">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><img src="./uploads/<?php echo $BlogData[0][6] ; ?>" alt=""></figure>
                                        <div class="post-date"><h3><?php echo time_elapsed_string($BlogData[0][7]) ; ?></h3></div>
                                    </div>
                                    <div class="lower-content">
                                        <ul class="post-info mb_6 clearfix">
                                            <li><i class="icon-24"></i><a href="blog-details.php?id=<?php echo $BlogData[0][1] ; ?>"><?php echo $BlogData[0][0] ; ?></a></li>
                                            <li><i class="icon-25"></i><?php  
                                            $sql = "SELECT user_tbl.fullname, comment_tbl.* FROM `comment_tbl` LEFT JOIN user_tbl on comment_tbl.user_id = user_tbl.id WHERE comment_tbl.blog_id='".$BlogData[0][1]."'";

                                            
                                                    $result = mysqli_query($conn,$sql);

                                                    $commntData = (mysqli_num_rows($result) > 0) ? mysqli_fetch_all($result) : array();
                                                    
                                                    echo count($commntData);?> 
                                                    Comnt</li>
                                        </ul>
                                        <h3><?php echo $BlogData[0][2] ; ?></h3>
                                        <p><?php echo $BlogData[0][5] ; ?></p>
                                        
                                        <blockquote>
                                            <div class="icon-box"><i class="icon-42"></i></div>
                                            <p><?php echo $BlogData[0][22] ; ?></p>
                                            <h4><?php echo $BlogData[0][0] ; ?></h4>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="comment-box mb_65">
                                <div class="group-title">
                                    <h3>Leave A Comments</h3>
                                </div>
                                <div class="comment-inner">

                                    <?php

                                        foreach($commntData as $commnt => $value) {
                                    ?>
                                    <div class="comment">
                                        <figure class="comment-thumb"><img src="assets/images/456322.webp" alt=""></figure>
                                        <h4><?php echo $commntData[$commnt][0] ; ?></h4>
                                        <span class="post-date"><?php echo $commntData[$commnt][5] ; ?></span>
                                        <p><?php echo $commntData[$commnt][4] ; ?></p>
                                       
                                    </div>
                                    
                                    <?php
                                                        }
                                    ?>
                                   
                                </div>
                            </div>
                            <div class="comment-form-area">
                                <div class="group-title">
                                    <h3>Leave A Comments</h3>
                                </div>
                                <div class="comment-form">
                                    <form action="./functions/commentCreate.php" method="post" class="default-form">
                                        <div class="row clearfix">
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <input name="blog" value="<?php echo $blogSelected; ?>" hidden />
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <textarea name="message" placeholder="Type message"></textarea>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <button type="submit" class="theme-btn btn-one"><span>Post Comment</span></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="blog-sidebar default-sidebar ml_40">
                           
                          
                            <div class="sidebar-widget post-widget">
                                <div class="widget-title">
                                    <h3>Recent Article</h3>
                                </div>
                                <div class="post-inner">
                                <?php 

                                        $sql = "SELECT  `id`, `title`, `image_cover`, `created_at`  FROM `blog_tbl` WHERE deleted = 0";

                                        $result = mysqli_query($conn,$sql);

                                        $BlogData = (mysqli_num_rows($result) > 0) ? mysqli_fetch_all($result) : array();

                                        // $ListedFoodData = array(1,3,4,5,5,2);

                                        // print_r($BlogData);

                                        foreach($BlogData as $blgData => $value) {
?>
                                    <div class="post">
                                        <figure class="post-thumb"><a href="blog-details.php?id=<?php echo  $BlogData[$blgData][0] ; ?>"><img src="./uploads/<?php echo  $BlogData[$blgData][2] ; ?>" alt=""></a></figure>
                                        <h5><a href="blog-details.php?id=<?php echo  $BlogData[$blgData][0] ; ?>"><?php echo  $BlogData[$blgData][1] ; ?></a></h5>
                                        <span class="post-date"><?php echo explode(" ",$BlogData[$blgData][3])[0] ; ?></span>
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
