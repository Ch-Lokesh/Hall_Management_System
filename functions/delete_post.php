<?php
    $con = mysqli_connect("localhost", "root", "" , "hms") or die("connectoin was not established");


    if(isset($_GET['post_id'])){
        $post_id = $_GET['post_id'];
        $delete_post = "delete from posts where post_id='$post_id'";
        $del_post = mysqli_query($con, $delete_post);

        if($del_post){
            echo"<script>alert('A post have been deleted!')</script>";
            if(isset($_SESSION['student_email'])){
                echo"<script>window.open('../student_files/student_home.php', '_self')</script>";
            }
            else{
                echo"<script>window.open('../admin_files/admin_home.php', '_self')</script>";
            }
            
        }
        else{
            echo"<script>alert('Error occured, unable to delete!')</script>";
            if(isset($_SESSION['student_email'])){
                echo"<script>window.open('../student_files/student_home.php', '_self')</script>";
            }
            else{
                echo"<script>window.open('../admin_files/admin_home.php', '_self')</script>";
            }
        }
    }
?>