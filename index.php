<?php include 'partials/_dbconnect.php' ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>iDiscuss - Coding Forum!</title>
</head>

<body>
    <!-- this is navbar -->
    <?php include 'partials/_header.php' ?>

    <!-- slider here  -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/1600x500/?coding" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1600x500/?coding,webdeveloper" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1600x500/?coding,android" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Categories of threads -->
    <div class="container">
        <h2 class="text-center my-4">iDiscuss-Categories</h2>
        <div class="row">

            <!-- fetching the categories from the data base  -->
            <?php
               $sql = "SELECT * FROM `category`";
               $result = mysqli_query($conn , $sql);
                while($row = mysqli_fetch_assoc($result)){
            //    This is for fething id and name from database 
            //    echo $row['category_id'];
            //    echo $row['category_name'];
                  $title = $row['category_name'];
                  $description = $row['category_description'];
                  $id = $row['category_id'];
            // here the href link pass the same page means same thread id
                  echo ' <div class="col-md-4 my-4">
                                <div class="card" >
                                    <img src="https://source.unsplash.com/500x400/?coding,'. $title .'" class="card-img-top" alt="coding">
                                    <div class="card-body">
                                        <h5 class="card-title">'. $title . '</h5>
                                        <p class="card-text">'.substr($description , 0 , 90) .'...</p>
                                        <a href="threadslist.php?rowid='.$id.'" class="btn btn-primary">View Thread</a>
                                    </div>
                                </div>
                         </div>';
                  }
             ?>
        </div>
    </div>
    <!-- this is footer  -->
    <?php include 'partials/_footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
</body>

</html>