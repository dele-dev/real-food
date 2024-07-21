<?php

$dataLink = "single";


// include init file
include "./init.php";


if(isset($_POST)){

    saveNewUser ($_POST,$conn);

}

function saveNewUser ($data,$conn){

    // check that fields are not empty
    if(!checkEmpty ($data)){


        $targetDir = "../uploads/";
        $selectedfile = basename($_FILES["image"]["name"]) ;
        $target_file = $targetDir . $selectedfile;
        $uploadOk = 1;

        
        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            displayMessageAndReplaceLocation('Sorry, your file is too large!','../listFood.php');
            $uploadOk = 0;
        }

                
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            displayMessageAndReplaceLocation('Sorry, your file was not uploaded!','../listFood.php');
        // if everything is ok, try to upload file
        } else {

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

            //print_r($data);
            $foodseleted = $data["foodseleted"];
            $title = $data["title"];
            $message = $data["message"];
            $image = $selectedfile;
            $user_id = $_SESSION["user_id"];



            $sql = "INSERT INTO `blog_tbl`(`id`, `title`, `food_id`, `user_id`, `message`, `image_cover`, `created_at`, `status`, `deleted`)
            value(null,'$title','$foodseleted','$user_id','$message','$image',now(),'0','0')";

            if (mysqli_query($conn, $sql)) {
                displayMessageAndReplaceLocation('Blog posted successful!','../blog.php');
            } else {
                displayMessageAndReplaceLocation('Something Happened Please try again!','../blog-create.php');
            }
            
            mysqli_close($conn);

   
        } else {
          displayMessageAndReplaceLocation('Sorry, there was an error uploading your file!','../blog-create.php');
          
        }
    }
      

    }else{
        displayMessageAndReplaceLocation('Empty first found, please fill and try again !','../blog-create.php');
    }
    
    
}

function checkEmpty ($data){
      foreach($data as $d => $value){
         if(empty($data[$d])){
            return true;
         }
      }

      return false;
}

function displayMessageAndReplaceLocation ($massage,$location) {

    echo "<script> alert('".$massage."');</script>";
    echo "<script> window.location.replace('".$location."');</script>";

}