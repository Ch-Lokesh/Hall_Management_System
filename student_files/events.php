<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['student_email'])){
    include("../config/student_header.php");
}
else if(isset($_SESSION['admin_email'])){
    include("../config/admin_header.php");
}

if(!isset($_SESSION['student_email'])&& !isset($_SESSION['admin_email'])){
    header("location:../index.php");
}
?>
<html>
    <head>
        
        <meta charset ="utf-8">
        <meta name="viewport" content="width=divice-width, initial-scale = 1.0">
        <title>Events</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../style/home.css">
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
           <div class="col-sm-12">
               <center>
                   <h2><strong>Recent Events</strong></h2>
               </center>
               <?php echo get_posts() ?>
           </div>
       </div>
    </body>
</html>