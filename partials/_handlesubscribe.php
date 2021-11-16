<?php
           if($_SERVER['REQUEST_METHOD'] == "POST"){
            include '_dbconnect.php';
             $sbc_email = $_POST['sbcemail'];
             $sql = "INSERT INTO `subscribers` (`subscriber_email`) VALUES('$sbc_email')";
             $result = mysqli_query($conn , $sql);
             if($result){
               echo '<p class="text-light">Subscribed</p>';
               header("location:../index.php");
             }
           }
      ?>