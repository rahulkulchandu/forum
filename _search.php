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
    <!-- this is shows the results of searching  -->
    <div class="container my-4">
        <h1>Search Result for <?php echo $_GET['search']?></h1>
        <?php
           $noResult=true;
           $query = $_GET['search']; //get the search
           $sql = "SELECT * FROM threads WHERE MATCH(thread_title,thread_desc) against('$query')";
           $result = mysqli_query($conn , $sql);
           while($row = mysqli_fetch_assoc($result)){
               $noResult=false;
               $title = $row['thread_title'];
               $desc = $row['thread_desc'];
               $id = $row['thread_id'];
               $url = "thread.php?threadid=".$id;
               echo ' <div class="media d-flex my-4">
               <img src="img/user.png" width="45px" height="45px" class="mx-2" alt="user">
               <div class="media-body">
                   <h5 class="mt-0"><a class="text-decoration-none" href="'.$url.'">'.$title.'</a></h5>
                   <p class="my-0 fw-bold">'.$desc.'</p>
               </div>
           </div>';
           }
     ?>
    </div>
    <?php
    if($noResult){
        echo ' <div class="container my-4">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">No Results Found</h1>
            </div>
        </div>
    </div>';
    }
    ?>

    <!-- this is footer  -->
    <?php include 'partials/_footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
</body>

</html>