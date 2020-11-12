<!DOCTYPE html>
<?php
session_start();
include("../config/student_header.php");
if(!isset($_SESSION['student_email'])){
    header("location:../index.php");
}
?>
<html>
    <head>
        <meta charset ="utf-8">
        <meta name="viewport" content="width=divice-width, initial-scale = 1.0">
        <title>Edit Post</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
                <?php
                    if(isset($_GET['post_id'])){
                        $get_id = $_GET['post_id'];

                        $get_post = "select * from posts where post_id='$get_id'";
                        $run_post = mysqli_query($con, $get_post);
                        $row = mysqli_fetch_array($run_post);

                        $post_con = $row['post_content']; 
                    }

                ?>
                <form action="" method="post" id="f">
                    <center><h1>Edit Your Post</h1></center>
                    <textarea name="content"  cols="30" rows="10" class="form-control"><?php echo($post_con); ?></textarea>
                    <br>
                    <input type="submit" name="update" value="Update Post" class="btn btn-info">
                </form>

                <?php 
                    if(isset($_POST['update'])){
                        $content = $_POST['content'];
                        if($content == ''){
                            echo"<script>alert('Please enter something as')</script>";
                        }
                        else{
                            $update_post = "update posts set post_content = '$content' where
                            post_id= '$get_id'";
                            $run_update = mysqli_query($con, $update_post);
                            if($run_update){
                                echo"<script>alert('Your Post have been updated')</script>";
                                echo("<script>window.open('student_home.php', '_self')</script>");
                            }
                        }
                        
                    }
                ?>
            </div>
            <div class="col-sm-3">
    
            </div>
        </div>
    </body>
</html>