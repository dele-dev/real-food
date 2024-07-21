<div class="col-lg-4 col-md-12 col-sm-12 content-column">
                        <div class="content-box mr_70">
                            <div class="sec-title mb_45">
                                <span class="sub-title">Welcome back, 
                                        <?php 
                                        $userData = array ();

                                        $LoginInUserName =  (isset($_SESSION["user_id"])) ? $_SESSION["user_fullaname"] : "" ;
                                        
                                        $splitedUserName =  explode($LoginInUserName," ");

                                        echo  (trim($splitedUserName[0]) == "" ) ? $LoginInUserName : $splitedUserName[0] ;

                                        if(isset($_SESSION["user_id"])){

                                            $user__ = $_SESSION["user_id"] ;
                                            $sqlGetUser = "SELECT * FROM `profile_tbl` WHERE user_id = '".$user__."'";
        
                                            $result = mysqli_query($conn,$sqlGetUser);
                                            
                                            $userData = (mysqli_num_rows($result) > 0) ? mysqli_fetch_all($result) : array();

                                            $userData = (count($userData) > 0 ) ? $userData[0]: $userData;

                                        }
                                        ?>.</span>
                                        <h2>
                                            <?php if(isset($_SESSION["user_id"])){
                                                    echo ($_SESSION["user_type"] == 1) ? 'Profile help with better food Listing' : 'Profile help with getting perfect recipients';
                                            } ?>
                                        </h2>
                                <p>          
                                        <?php if(isset($_SESSION["user_id"])){
                                                    echo ($_SESSION["user_type"] == 1) ? 'We are here to make you feel alright, your least of worries shhould be food.' : 'We are here to help you, help others. Surely your rewards are in heaven.';
                                            } ?>
                                </p>
                            </div>
                            <ul class="info-list clearfix">
                                <li>
                                    <div class="icon"><i class="icon-43"></i></div>
                                    <h4>Location</h4>
                                    <p style="    text-transform: capitalize;">
                                            <?php
                                             if(isset($_SESSION["user_id"])){
                                                    $locationStill = "";

                                                    if(count($userData) > 0){
                                                        $locationStill = $userData [3].", ".$userData[2].".";
                                                    }
                                                    echo ($locationStill == "") ? 'No location yet, please update your profile.' : $locationStill ;
                                            } ?>
                                    </p>
                                </li>
                                <li>
                                    <div class="icon"><i class="icon-4"></i></div>
                                    <h4>Phone no</h4>
                                    <p><a href="">
                                         <?php
                                             if(isset($_SESSION["user_id"])){
                                                    $phoneStill = "";
                            
                                                    if(count($userData) > 0){
                                                        $phoneStill = $userData [4];
                                                    }
                                                    echo ($phoneStill == "") ? 'No phone yet, please update your profile.' : $phoneStill ;
                                            } ?>
                                    </a></p>
                                </li>
                                <li>
                                    <div class="icon"><i class="icon-2"></i></div>
                                    <h4>Email</h4>
                                    <p><a href="">
                                          <?php if(isset($_SESSION["user_id"])){
                                                    echo $_SESSION["user_email"] ;
                                            } ?>
                                    </a></p>
                                </li>

                                <?php 
                                 if ($user_logged_in == true ) {

                                     if($_SESSION["user_type"] == 2 ){
                                    ?>

                                <li>
                                    <div class="icon"><i class="icon-2"></i></div>
                                    <p><a href="listFood.php">List Food</a></p>
                                </li>
                                <li>
                                    <div class="icon"><i class="icon-2"></i></div>
                                    <p><a href="foodCategory.php"> Food Category</a></p>
                                </li>

                                <?php 
                                     }}
                                ?>
                                <li>
                                    <div class="icon"><i class="icon-2"></i></div>
                                    <p><a href="logout.php">Logout</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    