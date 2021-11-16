<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    include '_dbconnect.php';
    $user_name = $_POST['username'];
    $user_password = $_POST['password'];
    $user_cpassword = $_POST['cpassword'];
    $user_email = $_POST['useremail'];
    // check the user already exist
    $existSql = "SELECT * FROM `users` WHERE username='$user_name'";
    $result = mysqli_query($conn , $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
        $showerr = "This user is already exist";
        echo $showerr;
    }
    else{
        if( $user_password == $user_cpassword){
          $sql = "INSERT INTO `users` (`username`,`useremail`, `password`) VALUES ('$user_name','$user_email', '$user_password')";
          $result = mysqli_query($conn , $sql);
          if($result){
             header("location:../index.php?signupsuccess=true");
          }
          else{
            $showalert = "There are some technical issue";
            echo "$showalert";
          }
        }
        else{
             $showerr = "The Confirm password do not match";
        echo $showerr;
        }
    }


}
?>