<?php
$dataLink = "single";
 
// include init file
include "./init.php";


if(isset($_POST)){

    loginUser ($_POST,$conn);

}

function loginUser ($data,$conn){

    // check that fields are not empty
    if(!checkEmpty ($data)){

        // print_r($data);
        $email = $data["email"];
        $password = $data["password"];


            $sql = "SELECT * FROM `user_tbl` WHERE email = '".$email."' and password = '".$password."'";

        //    echo $sql;
        
            $result = mysqli_query($conn,$sql);
        
            $userData = (mysqli_num_rows($result) > 0) ? mysqli_fetch_all($result) : array();
        
            if( count($userData) > 0){
        
                    $_SESSION["user_id"] = $userData[0][0];
                    $_SESSION["user_fullaname"] = $userData[0][1];          
                    $_SESSION["user_email"] = $userData[0][2];          
                    $_SESSION["user_type"] = $userData[0][7];

                    displayMessageAndReplaceLocation('Login succesful!','../index.php');
            }else{
                displayMessageAndReplaceLocation('Email or password not correct! Please try again.','../Auth');
            }
            
            mysqli_close($conn);


    }else{
        displayMessageAndReplaceLocation('Empty first found, please fill and try again !','../Auth/register.php');
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