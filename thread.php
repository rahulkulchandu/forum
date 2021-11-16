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

    <title>welcome to threds-questions !</title>
</head>

<body>
    <!-- this is header  -->
    <?php include 'partials/_header.php' ?>

    <!-- this is the same thread shows here  -->
    <?php
         $id = $_GET['threadid']; //here the receive the passes id from the thread href link 
         $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
         $result = mysqli_query($conn , $sql);
         $row = mysqli_fetch_assoc($result);
         $commented_by = $row['thread_user_id'];
         $sql2 = "SELECT username FROM `users` WHERE Sno='$commented_by'";
         $result2 = mysqli_query($conn , $sql2);
         $row2 = mysqli_fetch_assoc($result2);
         $posted_by = $row2['username'];
        //  fetch same detail from threads 
        //  echo $row['category_name'];
    ?>

    <!-- this is for user input comments  -->
    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $th_comment = $_POST['comment'];
            $th_comment = str_replace("<" , "&lt;" , $th_comment);
            $th_comment = str_replace(">" , "&gt;" , $th_comment);
            $th_comment  = str_replace("'" ,"&apos;" , "$th_comment");
            $sno=$_SESSION['id'];
            $sql = "INSERT INTO `comment` (`comment_content`, `thread_id`, `comment_by`) VALUES ('$th_comment', '$id', '$sno')";
            $result = mysqli_query($conn , $sql);
            if($result){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Thank-You!</strong>For Post Your Comment.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            }
            else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Sorry!</strong>Please Try Again Later.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            }
        }
    ?>
    <!-- it shows the thread detail  -->
    <div class="container my-4">
        <div class="p-1 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold"><?php echo $row['thread_title'] ?></h1>
                <p class="col-md-12 fs-4"><?php echo $row['thread_desc'] ?></p>
                <p>Posted By:<b><?php echo $posted_by ?></b></p>
            </div>
        </div>
    </div>

    <!-- this is for user to post comments -->
    <?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
         echo '<div class="container">
                <h1 class="my-3">Post A Comment</h1>
                <form action="'.$_SERVER['REQUEST_URI'].'" method="post">
                    <div class="form-group">
                        <label for="comment">Post Your Comment</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Post Comment</button>
                </form>
            </div>';
    }
    else{
        echo ' <div class="container my-4">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-6 fw-bold">You Are Not Logged In ! Please Log In To Be Able To Post A Comment!</h1>
            </div>
        </div>
    </div>';
    }
?>

    <!-- this is for post comment  -->
    <div class="container">
        <h1 class="my-3">Discussion</h1>
        <!-- fetch all question from database  -->
        <?php
         $id = $_GET['threadid'];
         $sql = "SELECT * FROM `comment` WHERE thread_id=$id";
         $result = mysqli_query($conn , $sql);
         $noResult = true;
         while($row = mysqli_fetch_assoc($result)){
            $noResult = false;
             $id = $row['comment_id'];
             $content = $row['comment_content'];
             $comment_by = $row['comment_by'];
             $sql2 = "SELECT username FROM `users` WHERE Sno='$comment_by'";
             $result2 = mysqli_query($conn , $sql2);
             $row2 = mysqli_fetch_assoc($result2);
             echo '
             <div class="media d-flex my-4">
                 <img src="img/user.png" width="45px" height="45px" class="mx-2" alt="user">
                 <div class="media-body">
                     <p class="fs-4 mb-0">'.$content.'</p>
                     <p class="my-0">Posted by : ' .$row2['username'].'</p>
                 </div>
             </div>';
         }
        //  echo var_dump($noResult);
        if($noResult){
            echo ' <div class="container my-4">
            <div class="p-5 mb-4 bg-light rounded-3">
                <div class="container-fluid py-2">
                    <h1 class="display-5 fw-bold">No Comment found!</h1>
                    <p class="col-md-12 fs-4">Be the first person to podt first comment</p>
                </div>
            </div>
        </div>';
        }
    ?>
    </div>

    <!-- this is footer  -->
    <?php include 'partials/_footer.php' ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
</body>

</html>