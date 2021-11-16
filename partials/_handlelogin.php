<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include '_dbconnect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "Select *from users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn , $sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
        $row = mysqli_fetch_assoc($result);
        // echo "loggedin";
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $row['Sno'];
        $_SESSION['username'] = $username;
        header("location:../index.php");
        
    }
    else{
        echo "Invalid Credientals";
    }
}
?>