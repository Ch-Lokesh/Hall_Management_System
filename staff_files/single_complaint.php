<!DOCTYPE html>
<?php

session_start();
if(isset($_SESSION['admin_email'])){
    include('../config/admin_header.php');
}
else if(isset($_SESSION['staff_phone'])){
    include("../config/staff_header.php");
}
else{
    header("location:../index.php");
}

?>
<html>
    <head>
        <meta charset ="utf-8">
        <meta name="viewport" content="width=divice-width, initial-scale = 1.0">
        <title>Complaint</title>
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
        .complaint{
            border:3px solid violet;
            border-radius: 20px;
            margin:20px;
            padding: 30px 40px;
        }
    </style>

    <body>
        <div class="row">
            <div class="col-sm-12">
                <center><h2>Complaint</h2></center>
            </div>
        </div>
        <?php single_complaint(); ?>
    </body>
</html>