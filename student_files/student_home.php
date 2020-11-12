<!DOCTYPE html>
<?php
session_start();
include("../config/student_header.php");
if(!isset($_SESSION['student_email'])){
    header("location:(../index.php)");
}
?>
<html>
    <head>
        <?php
            $student = $_SESSION['student_email'];
            $get_student = "select * from students  where student_email = '$student'";
            $run_student = mysqli_query($con, $get_student);
            if(!$run_student){
                echo("<script>alert('Something wrong in the session, (from home)')</script>");
                header("location:index.php");
            }
            else{
                $row = mysqli_fetch_array($run_student);

                $student_name = $row['student_name'];
            }
        ?>
        <meta charset ="utf-8">
        <meta name="viewport" content="width=divice-width, initial-scale = 1.0">
        <title>Home</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../style/home.css">
        <link rel="stylesheet" type="text/css" href="../style/footer.css">
    </head>
    <style>
        body{
            background-image: url('../images/MegaTron.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            overflow-x: hidden;
        }
    </style>

    <body>
       <div class="row">
           <div class="col-sm-12" id="insert_post">
               <center>
                <form action='student_home.php?stu_id=<?php echo($student_id); ?>' method='post'
                id="f" enctype="multipart/form-data">
                    <textarea name="content" id="content" rows="4" class="form-control" 
                    placeholder="Add a Post"></textarea><br><br>
                    <label class="btn btn-warning" id="upload_image_button">Select Image
                        <input type="file" name="post_image" size="60"></label>
                    <br><br>
                    <button id="btn-post" name="sub">Post</button>
                </form>
                <?php insertPost(); ?>
               </center>
           </div>
       </div>
       <div class="row">
           <div class="col-sm-12">
               <center>
                   <h2><strong>News Feed</strong></h2>
               </center>
               <?php echo get_posts() ?>
           </div>
       </div>
       <?php include("../config/footer.php") ?>
    </body>
</html>