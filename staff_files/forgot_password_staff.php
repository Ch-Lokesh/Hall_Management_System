<!DOCTYPE html>
<html>
    <head>
        <meta charset ="utf-8">
        <meta name="viewport" content="width=divice-width, initial-scale = 1.0">
        <title>Forgot Password</title>
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
                        <h3 style="text-align:center"> <strong>Forgot password</strong></h3><hr>
                    </div>
                    <div class="l_pass">
                        <form action="" method="post">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user">
                                </i></span>
                                <input class="form-control" type="text" name = "phone" placeholder="enter your phone number" required id="phone">
                            </div><br><hr>
                            <pre class="text">Enter Your Best Friend's name,(If you didn't regiter answer to this query before please contact admin.</pre>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil">
                                    </i></span>
                                <input type="text" id="msg" class="form-control" name="recovery_account" required>
                            </div><br>
                            <a style="text-decoration:none; float:right; color:187FAB" data-toggle="tooltip" href="signinStaff.php">Back to Signin?</a><br>
                            <center><button id="signup" class="btn btn-info btn-lg" name="submit">Submit</button></center>
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
    if(isset($_POST['submit'])){
        $phone = htmlentities(mysqli_real_escape_string($con, $_POST['phone']));
        $recovery_account = htmlentities(mysqli_real_escape_string($con, $_POST['recovery_account']));

        $select_staff = "select * from staff where staff_phone = '$phone'";
        $run_staff = mysqli_query($con, $select_staff);

        $num = mysqli_num_rows($run_staff);

        if($num == 1){
            $row_staff = mysqli_fetch_array($run_staff);
           
            $real_recovery = $row_staff['recovery_account'];
            if($real_recovery == "admin"){
                
                echo("<script>alert('You didn't set your security question , Please contant admin
                    for password change')</script>");
    
                exit();
            }
            else{
                if($real_recovery == $recovery_account){
                    $_SESSION['staff_phone'] = $phone;
                    echo("<script>window.open('change_password.php', '_self')</script>");
                }
                else{
                    echo "<script>alert('Your Email or Friend name is incorrect')</script>";
                }
            }
        }
        else{
            echo "<script>alert('No user exists with entered phone number')</script>";
        }
       
    }
?>