<?php
// The database connection 
$servername = "localhost";
$username = "root";
$passsword = "";
$database = "idiscuss";
$conn = mysqli_connect($servername , $username ,$passsword ,$database);
if(!$conn){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry!</strong>There are some technical isssue-- please try again!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
}
?>