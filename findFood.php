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

<title>FoodSave - Find Food </title>

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
                    <h1> Food List</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.html">Home</a></li>
                        <li>Food List</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page-title end -->


        <!-- blog-grid -->
        <section class="blog-grid pt_150 pb_150">
            <div class="auto-container">
                      <?php 
                        if ($user_logged_in == true ) {
                                    if($_SESSION["user_type"] == 2 ){
                                    ?>
                                    
                             <a href="listFood.php" style="color: #3A9E1E;padding: 10px;border: 1px solid;margin: 20px;" target="_blank" rel="noopener noreferrer">+ List Food</a>
                  <br>
                  <br>
                  <?php }
                  }
                  
                  ?>
                <div class="row clearfix">

                    <?php 

                            // MATCHING SEARCH ALGORITHM 
                            // IMPLEMENTATION 

                            if(isset($_SESSION["user_id"])){

                            $myUserId = $_SESSION["user_id"];
                            $myUserType = $_SESSION["user_type"] ;

                            $myUserProfileSql  =   "SELECT * FROM `profile_tbl` WHERE user_id = '".$myUserId."'";
        
                            $result_ = mysqli_query($conn,$myUserProfileSql);
                            
                            $userData = (mysqli_num_rows($result_) > 0) ? mysqli_fetch_all($result_) : array();

                            $userData = (count($userData) > 0 ) ? $userData[0]: $userData; 


                            $sqlRecipientMatching = "";


                            if(count($userData) > 0 ){

                                $state = $userData[2];
                                $city = $userData[3];


                            $sqlRecipientMatching = "SELECT food_listing_tbl.*,category_tbl.* FROM `food_listing_tbl` left join
                            category_tbl on food_listing_tbl.category_id = category_tbl.id WHERE food_listing_tbl.deleted = '0' AND
                             food_listing_tbl.state = '$state' or  food_listing_tbl.city = '$city'";

                            }else{

                                $sqlRecipientMatching = "SELECT food_listing_tbl.*,category_tbl.* FROM `food_listing_tbl` left join
                                category_tbl on food_listing_tbl.category_id = category_tbl.id WHERE food_listing_tbl.deleted = '0'";

                            }

                            $sqlProviderMatching = "SELECT food_listing_tbl.*,category_tbl.* FROM `food_listing_tbl` left join
                            category_tbl on food_listing_tbl.category_id = category_tbl.id WHERE food_listing_tbl.deleted = '0' and food_listing_tbl.user_id = '".$myUserId."'";


                            $sql = ($myUserType == 2 ) ? $sqlProviderMatching : $sqlRecipientMatching ;

                            $result = mysqli_query($conn,$sql);

                            $ListedFoodData = (mysqli_num_rows($result) > 0) ? mysqli_fetch_all($result) : array();

                            // $ListedFoodData = array(1,3,4,5,5,2);

                            // print_r($ListedFoodData);

                            foreach($ListedFoodData as $foodData => $value) {
                    ?>

                                <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                                    <div class="news-block-two wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image" ><a href="#">
                                                    <img  src="./uploads/<?php echo $ListedFoodData[$foodData][7]; ?>" alt=""></a></figure>
                                                <span class="post-date">listed @ <?php echo time_elapsed_string($ListedFoodData[$foodData][13]); ?></span>
                                            </div>
                                            <div class="lower-content">
                                                <span class="category" style="    text-transform: capitalize;"><?php echo $ListedFoodData[$foodData][17]; ?></span>
                                                <h3><a href="blog-details.html"><?php echo $ListedFoodData[$foodData][3]; ?></a></h3>
                                                <p><?php echo $ListedFoodData[$foodData][18]; ?></p>

                                                <?php
                                                                 if ($user_logged_in == true ) {
                                                                                if($_SESSION["user_type"] == 1 ){
                                                ?>
                                                <ul class="post-info clearfix">
                                                    <li class="author-box">
                                                        <a href="schedule.php?id=<?php echo  $ListedFoodData[$foodData][0] ;?>">Schedule </a>
                                                    </li>
                                                    <li>
                                                         <a href="blog-create.php?id=<?php echo  $ListedFoodData[$foodData][0] ;?>">Blog </a>
                                                    </li>
                                                    <li>
                                                         <a href="review.php?id=<?php echo  $ListedFoodData[$foodData][0] ;?>">Review </a>
                                                    </li>
                                                </ul>
                                                <?php
                                                                            }else{

?>
                                                <ul class="post-info clearfix">
                                                    <li class="author-box">
                                                        <a href="view.php?id=<?php echo  $ListedFoodData[$foodData][0] ;?>">View </a>
                                                    </li>
                                                   
                                                </ul>
<?php

                                                                               }

                                                                           } 
                                                                            
                                                                            
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <?php } ?>
                    
                    <?php 

                    }else{
                        echo "<script> window.location.replace('./Auth');</script>";

                    }
                    ?>
                </div>
                
            </div>
        </section>
        <!-- blog-grid end -->


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
