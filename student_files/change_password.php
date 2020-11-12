<!DOCTYPE html>
<html>
    <head>
        <meta charset ="utf-8">
        <meta name="viewport" content="width=divice-width, initial-scale = 1.0">
        <title>Change Password</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
        <style>
        body{
            background-image: url('images/MegaTron.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            overflow-x: hidden;
        }
        .main-content{
            width: 50%;
            height: 40%;
            margin: 10px auto;
            background-color: #fff;
            border:2px solid #e6e6e6;
            padding:40px 50px;
        }
        .header{
            border: 0px solid #000;
            margin-bottom: 5px;
        }
        .well{
            background-color: #187FA3;
        }
        #signup{
            width:60%;
            border-radius:30px;
        }
        </style>
    <body>
        <div class="row">
            <div class="col-sm-12">
                <div class="well">
                    <center><h1 style="color:white"><strong>Social Network</strong></h1></center>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="main-content">
                    <div class="header">
                        <h3 style="text-align:center"> <strong>Change password</strong></h3><hr>
                    </div>
                    <div class="l_pass">
                        <form action="" method="post">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock">
                                </i></span>
                                <input class="form-control" type="password" name = "pass" placeholder="Enter new password" required id="password">
                            </div><br>
                            
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock">
                                    </i></span>
                                <input type="password" id="password" class="form-control" name="pass1" required placeholder="Re enter password">
                            </div><br>
                            
                            <center><button id="signup" class="btn btn-info btn-lg" name="change">Change Password</button></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<?php

session_start();
include("../config/configure.php");
if(isset($_SESSION['student_email'])){
    $student = $_SESSION['student_email'];
    $select_student = "select * from students where student_email = '$student'";
    $run_student = mysqli_query($con, $select_student);
    $row_student = mysqli_fetch_array($run_student);
    $student_id =$row_student['student_id'];

    if(isset($_POST['change'])){
        $pass = htmlentities(mysqli_real_escape_string($con, $_POST['pass']));
        $pass1 = htmlentities(mysqli_real_escape_string($con, $_POST['pass1']));
    
       if($pass == $pass1){
           if(strlen($pass) >= 6){
               $update = "update students set student_pass = '$pass' where student_id='$student_id'";
               $run = mysqli_query($con, $update);
    
               echo"<script>alert('Your password is changed')</script>";
               echo"<script>window.open('student_home.php', '_self')</script>";
           }
           else{
            echo"<script>alert('password must have at least 6 chars')</script>";
           }
       }
       else{
        echo"<script>alert('Your password is not matched try again')</script>";
        echo"<script>window.open('change_password.php?stu_id=$student_id', '_self')</script>";
       }
    
       
    }
}

?>