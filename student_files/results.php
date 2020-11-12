<!DOCTYPE html>
<?php 
session_start();
if(isset($_SESSION['student_email'])){
    include("../config/student_header.php");
}
else if(isset($_SESSION['admin_email'])){
    include("../config/admin_header.php");
}

if(!isset($_SESSION['student_email']) && !isset($_SESSION['admin_email'])){
    header("location:../index.php");
}
?>
<html>
    <head>
        <meta charset ="utf-8">
        <meta name="viewport" content="width=divice-width, initial-scale = 1.0">
        <title>Results</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../style/home.css">
    </head>
    <style>
        body{
            overflow-x: hidden;
            background-image: url('../images/MegaTron.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            
        }
    </style>

    <body>
        <div class="row">
            <center><h2>See Your Results</h2></center>
            <hr style="border:2px solid black">
            <?php results(); ?>
        </div>
    </body>
</html>