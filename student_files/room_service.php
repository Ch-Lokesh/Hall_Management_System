<!DOCTYPE html>
<?php

session_start();
if(isset($_SESSION['student_email'])){
    include('../config/student_header.php');
}
else if(isset($_SESSION['admin_email'])){
    include("../config/admin_header.php");
}
if(!isset($_SESSION['student_email'])){
    header("location:../index.php");
}
?>
<html>
    <head>
        <meta charset ="utf-8">
        <meta name="viewport" content="width=divice-width, initial-scale = 1.0">
        <title>Room Service</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../style/home.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../style/footer.css">
    </head>
    <style>
        body{
            background-image: url('../images/MegaTron.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            overflow-x: hidden;
            size: 100vh;
        }
        .sel{
            margin-top: 10px;
        }
        .lab{
            color:grey;
            font-size: 18px;
            font-family: Arial, Helvetica, sans-serif;
        }
        .gp{
            margin-left: 20px;
        }
    </style>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <center><h2>Ask for Room Service</h2></center>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-12"><h3>Preferred Time Slot</h3></div>
                    </div>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label class="lab">From
                                    <select name="from" id="" class="form-control" style="width: 75px">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="radio" name="from_p" value="am" >
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="from" style="font-size: 18px; color:grey; font-family:Arial, Helvetica, sans-serif; margin-left:-10px">am</label>
                                    </div>
                                    <div class="col-sm-5">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="radio" name="from_p" value="pm" >
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="from" style="font-size: 18px; color:grey; font-family:Arial, Helvetica, sans-serif; margin-left:-10px">pm</label>
                                    </div>
                                    <div class="col-sm-5">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label class="lab">To
                                    <select name="to" id="" class="form-control" style="width: 75px">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="radio" name="to_p" value="am" >
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="from" style="font-size: 18px; color:grey; font-family:Arial, Helvetica, sans-serif; margin-left:-10px">am</label>
                                    </div>
                                    <div class="col-sm-5">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="radio" name="to_p" value="pm" >
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="from" style="font-size: 18px; color:grey; font-family:Arial, Helvetica, sans-serif; margin-left:-10px">pm</label>
                                    </div>
                                    <div class="col-sm-5">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1">
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="room_no" class="lab">Room No:
                                        <textarea name="room_no" id="room_no" class="form-control" placeholder="Enter your room number"></textarea>
                                    </label>
                                </div>
                            </div>
                        </div><br>
                        <center><button class="btn btn-primary btn-lg" name="time">Submit</button></center>
                        <?php
                            if(isset($_POST['time'])){
                                $from_time = '12';
                                $to_time = '12';
                                $from_p = "am";
                                $from_p = "pm";

                                $from_time = $_POST['from'];
                                $to_time = $_POST['to'];
                                $from_p = $_POST['from_p'];
                                $to_p = $_POST['to_p'];

                                $room_no = $_POST['room_no'];

                                if(strlen($room_no) == 0){
                                    echo"<script>alert('please select Room No')</script>";
                                }
                                else{
                                    $insert = "insert into service_call (student_id, from_time, from_p, to_time, to_p, room_no) 
                                    values ('$student_id', '$from_time', '$from_p', '$to_time', '$to_p', '$room_no' )";
                                
                                    $run = mysqli_query($con, $insert);
                                    if(!$run){
                                        echo"<script>alert('something is wrong in database')</script>";
                                    }
                                    else{
                                        echo("<script>Your request added</script>");
                                    }
                                }

                            }
                        ?>
                    </form>
                </div>
                <div class="col-sm-3">
                </div>
            </div>
            <br><br><hr><br><br>
            <div class="row">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-8">
                    <form action="" method="post">
                        <div class="form-group">
                            <label style="color: black; font-size:2rem; font-family:Arial, Helvetica, sans-serif">Write your Suggessions or Complaints (Room Service)</label><br>
                            <textarea style="font-size: 2rem;" name="complaint" class="form-control" placeholder="write here"></textarea>
                        </div>
                        <center><button type="submit" name="make" class="btn btn-primary btn-lg">Submit</button></center>

                        <?php
                            if(isset($_POST['make'])){
                                $complaint = htmlentities(mysqli_real_escape_string($con, $_POST['complaint']));
                                $student_id = $_GET['stu_id'];
                                $reply = "";

                                $insert = "insert into mess_complaints (student_id, complaint, complaint_type, reply, date) values
                                ('$student_id', '$complaint', 'room', '$reply', NOW())";
                                
                                $run_insert = mysqli_query($con, $insert);
                                
                                if($run_insert){
                                    echo"<script>alert('Your Complaint/Suggestion added!')</script>";
                                    echo"<script>window.open('student_home.php?stu_id=$student_id', '_self')</script>";
                                }
                                else{
                                    echo"<script>alert('Opps! something went wrong')</script>";
                                }
                            }       
                        ?>
                    </form>
                </div>
                <div class="col-sm-2">
                </div>
            </div>
        </div>
        
    </body>
    
</html>