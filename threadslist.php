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

    <title>welcome to threds-List !</title>
</head>

<body>
    <!-- this is header -->
    <?php include 'partials/_header.php' ?>


    <!-- this is threds lists  -->
    <?php
         $id = $_GET['rowid']; //get the passes id from back page
         $sql = "SELECT * FROM `category` WHERE category_id=$id";
         $result = mysqli_query($conn , $sql);
         $row = mysqli_fetch_assoc($result);
        //  fetch same detail from threads 
        //  echo $row['category_name'];
    ?>

    <!-- this is for users to post a thred in to threadlists  -->
    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $th_title = $_POST['title'];
            $th_title = str_replace("<" , "&lt;" , $th_title);
            $th_title = str_replace(">" , "&gt;" , $th_title);
            $th_title = str_replace("'" ,"&apos;" , "$th_title");
            $th_desc = $_POST['desc'];
            $th_desc = str_replace("<" , "&lt;" , $th_desc);
            $th_desc = str_replace(">" , "&gt;" , $th_desc);
            $th_desc = str_replace("'" ,"&apos;" , "$th_desc");
            $sno=$_SESSION['id'];
            $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id` ,`thread_user_id`) VALUES ('$th_title', '$th_desc', '$id', '$sno')";
            $result = mysqli_query($conn , $sql);
            if($result){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Successfully!</strong>Added Your Question.
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
    <div class="container my-4">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Welcome To <?php echo $row['category_name'] ?> Threads!</h1>
                <p class="col-md-12 fs-4"><?php echo $row['category_description'] ?></p>
                <p>Posted by:<b>Rahul</b></p>
            </div>
        </div>
    </div>

    <!-- this is question input from user  -->
    <?php  
   if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
          echo '<div class="container">
                    <h1 class="my-3">Start A Discussion</h1>
                    <form action="'.$_SERVER['REQUEST_URI'].'" method="post">
                        <div class="mb-3">
                            <label for="title" class="form-label">Thread Title</label>
                            <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Keep your title short as posible!</div>
                        </div>
                        <div class="form-group">
                            <label for="desc">Ellaborate Your Consern</label>
                            <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Post Thread</button>
                    </form>
                </div>';
   }
   else{
       echo ' <div class="container my-4">
       <div class="p-5 mb-4 bg-light rounded-3">
           <div class="container-fluid py-5">
               <h1 class="display-6 fw-bold">You Are Not Logged In ! Please Log In To Be Able To Post A Thread!</h1>
           </div>
       </div>
   </div>';
   }
?>

    <!-- this is questions container -->
    <div class="container">
        <h1 class="my-3">Browse Questions</h1>
        <!-- fetch all question from database  -->
        <?php
         $id = $_GET['rowid'];
         $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
         $result = mysqli_query($conn , $sql);
         $noResult = true;
         while($row = mysqli_fetch_assoc($result)){
            $noResult = false;
             $id = $row['thread_id'];
             $title = $row['thread_title'];
             $desc = $row['thread_desc'];
             $thread_user_id = $row['thread_user_id'];
             $sql2 = "SELECT username FROM `users` WHERE Sno='$thread_user_id'";
             $result2 = mysqli_query($conn , $sql2);
             $row2 = mysqli_fetch_assoc($result2);
             echo '
             <div class="media d-flex my-2">
                 <img src="img/user.png" width="45px" height="45px" class="mx-2" alt="user">
                 <div class="media-body">
                     <h5 class="mt-0"><a class="text-decoration-none" href="thread.php?threadid='.$id.'">'.$title.'</a></h5>
                     <p class="my-0 fw-bold">'.$desc.'</p>
                     <small class="my-0">Posted by: <em> ' .$row2['username'].'</em> </small>
                 </div>
             </div>';
         }
        //  echo var_dump($noResult);
        if($noResult){
            echo ' <div class="container my-4">
            <div class="p-5 mb-4 bg-light rounded-3">
                <div class="container-fluid py-2">
                    <h1 class="display-5 fw-bold">No Threads found!</h1>
                    <p class="col-md-12 fs-4">Be the first person to ask any question</p>
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