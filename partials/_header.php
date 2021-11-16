<?php


echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="./index.php">iDiscuss</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="./contactus.php">Contact</a>
      </li>
    </ul>
    <div class="d-flex mx-2">

            <form class="d-flex" method="get" action="_search.php">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
            </form>';
            session_start();
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
              echo '<p class="text-light mx-2 mb-0" style="line-height:36px;">Welcome: ' . $_SESSION['username'].'</p>
                    <button class="btn btn-primary mx-2"><a class="text-decoration-none text-light" href="partials/_logout.php">Log Out</a></button>';
            }
            else{
                   echo '<button class="btn btn-primary mx-2"  data-bs-toggle="modal"  data-bs-target="#signupmodal">Sign Up</button>
                    <button class="btn btn-primary mr-2"  data-bs-toggle="modal" data-bs-target="#loginmodal">Log In</button>';
            }
    echo'</div>
   
  </div>
</div>
</nav>';

include 'partials/_signupmodal.php';
include 'partials/_loginmodal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] =="true"){
  echo '<div class="alert alert-success my-0 alert-dismissible fade show" role="alert">
        <strong>Successful Created Account!</strong>Now You Can Log In.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
}
?>