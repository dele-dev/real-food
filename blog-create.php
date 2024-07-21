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

<title>FoodSave - Home|Blog </title>

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
<link href="assets/css/module-css/banner.css" rel="stylesheet">
<link href="assets/css/module-css/feature.css" rel="stylesheet">
<link href="assets/css/module-css/about.css" rel="stylesheet">
<link href="assets/css/module-css/service.css" rel="stylesheet">
<link href="assets/css/module-css/skills.css" rel="stylesheet">
<link href="assets/css/module-css/funfact.css" rel="stylesheet">
<link href="assets/css/module-css/team.css" rel="stylesheet">
<link href="assets/css/module-css/cta.css" rel="stylesheet">
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





        <!-- cta-style-three -->
        <section class="cta-style-three p_relative pt_150 pb_150" id="schedule">
            <div class="bg-layer parallax-bg" data-parallax='{"y": 100}' style="background-image: url(assets/images/background/cta-bg-2.jpg);"></div>
            <div class="auto-container">
                <div class="inner-box">
                    <h2> Make Blog <span>Post About</span> </h2>
                    <hr>
                    <div class="form-inner">
                            <form method="post" action="./functions/blogCreate.php" id="contact-form" class="default-form" enctype="multipart/form-data"> 
                                <div class="row clearfix">

                                    <?php


                                        if(!isset($_GET["id"])){
                                    ?>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <select  name="foodseleted"  required="">
                                            <option value="">Select a Listed Food </option>
                                            <?php 

                                                $sql = "SELECT * FROM `food_listing_tbl` WHERE deleted = '0'";

                                                $result = mysqli_query($conn,$sql);

                                                $ListedFoodData = (mysqli_num_rows($result) > 0) ? mysqli_fetch_all($result) : array();

                                                    // $ListedFoodData = array(1,3,4,5,5,2);

                                                    foreach($ListedFoodData as $foodData => $value) {
                                            ?>
                                                     <option value="<?php echo $ListedFoodData[$foodData][0]; ?>"><?php echo $ListedFoodData[$foodData][3]; ?></option>
                                            <?php
                                                    }
                                            ?>
                                        </select>

                                    </div>
                                    <?php
                                        }else{

                                            $sql = "SELECT * FROM `food_listing_tbl` WHERE deleted = '0' and id = '".$_GET["id"]."'";

                                            $result = mysqli_query($conn,$sql);
    
                                            $ListedFoodData = (mysqli_num_rows($result) > 0) ? mysqli_fetch_all($result) : array();
                                    ?>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <h3><?php echo $ListedFoodData[0][3]; ?></h3>
                                        <input type="text" name="foodseleted" value="<?php echo $ListedFoodData[0][0]; ?>" hidden placeholder="Food title/name" required="">
                                    </div>

                                    <?php
                                        }
                                    ?>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="title"  placeholder="Blog Title" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label for="Image">Blog Cover</label>
                                        <input type="file" name="image"   required="">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="message" placeholder="message"></textarea>
                                    </div>
                                   
                                    <div class="btn-box">
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn centred">
                                                <button class="theme-btn btn-one shadow" type="submit" ><span>Send</span></button>
                                            </div>
                                     </div>
                                </div>
                            </form>
                        </div>
                
                </div>
            </div>
        </section>
        <!-- cta-style-three end -->



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
