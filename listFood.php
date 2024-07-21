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

<title>FoodSave - List Food | Profile</title>

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
<link href="assets/css/module-css/contact.css" rel="stylesheet">
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
                    <h1>User Profile</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li>Profile - List Food</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page-title end -->


        <!-- contact-section -->
        <section class="contact-section pt_150 pb_150">
            <div class="auto-container">
                <div class="row clearfix">
                    <?php
                        include "./includes/profileSide.php";
                    ?>
                    <div class="col-lg-8 col-md-12 col-sm-12 form-column">
                        <div class="form-inner">
                            <form method="post" action="./functions/listFood.php" id="contact-form" class="default-form" enctype="multipart/form-data"> 
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <select  name="foodcategory"  required="">
                                            <option value="">Select a category </option>
                                            <?php 

                                                    $sql = "SELECT * FROM `category_tbl` WHERE deleted = '0'";

                                                    $result = mysqli_query($conn,$sql);

                                                    $ListedFoodData = (mysqli_num_rows($result) > 0) ? mysqli_fetch_all($result) : array();
                                                    // $ListedFoodData = array(1,3,4,5,5,2);

                                                    foreach($ListedFoodData as $foodData => $value) {
                                            ?>
                                                     <option value="<?php echo $ListedFoodData[$foodData][0]; ?>"><?php echo $ListedFoodData[$foodData][1]; ?></option>
                                            <?php
                                                    }
                                            ?>
                                        </select>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="title"  placeholder="Food title/name" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="state"  placeholder="State In" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="city"  placeholder="Cite In" required="">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <input type="number"  name="quantity"  required="" placeholder="How many pieces">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label for="expdate">Expired Date</label>
                                        <input type="date"  name="expdate"  required="" >
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label for="expdate">Food Image</label>
                                        <input type="file"  name="image"  required="" >
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea  name="description"  required="" placeholder="Food description"></textarea>
                                    </div>
                                    <br>
                                    <h4>Schedule Phace</h4>
                                    <hr>
                                    <br>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <select  name="schduletype"   required="">
                                            <option value="">Schdule Type </option>
                                            <option value="Pick up">Pick up </option>
                                            <option value="Drop off">Drop off </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label for="daterange">Date Rage</label>
                                        <br>
                                        <b>from</b> <input type="date"  name="fromdate"  required="" >
                                        <br>
                                        <b>to</b> <input type="date"  name="todate"  required="" >
                                    </div>
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn centred">
                                        <button class="theme-btn btn-one shadow" type="submit" ><span>Save</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-section end -->

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

    <!-- map script -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
    <script src="assets/js/gmaps.js"></script>
    <script src="assets/js/map-helper.js"></script>

    <!-- main-js -->
    <script src="assets/js/script.js"></script>

</body><!-- End of .page_wrapper -->
</html>
