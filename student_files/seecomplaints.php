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
        <title>Your Complaints</title>
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
        .content{
            font-size: 18px;
        }
        .complaint{
            border:3px solid violet;
            border-radius: 20px;
            padding:20px;
            margin: 10px;
        }
        .large{
            font-size:20px;
        }
    </style>

    <body>
       <div class="row">
            <center><h1>See Your Recent Complaints</h1></center>
            <?php
            if(isset($_GET['stu_id'])){
                $student_id = $_GET['stu_id'];
            }
            $select_mess = "SELECT * FROM mess_complaints WHERE student_id='$student_id' ORDER by 1 DESC LIMIT 5";
            $run = mysqli_query($con, $select_mess);
            if(!$run){
                echo("<script>window.alert('Ooops! something went wrong in database')</script>");
                echo("<script>window.open('my_profile.php?stu_id=$student_id', '_self')</script>");
            }
            else{

                while($row = mysqli_fetch_array($run)){
                    $complaint = $row['complaint'];
                    $date = $row['date'];
                    $reply = $row['reply'];

                    echo"
                        <div class='container-fluid'>
                        <div class='row'>
                            <div class='col-sm-4'>
                            </div>
                            <div class='col-sm-6'>
                            <div class='complaint'>
                                    <div class='row'>
                                        <div class='col-sm-12'>
                                            <p class='large' style='font-size: 20px'><strong>Complaint added on :</strong>$date</p><hr>
                                        </div>
                                    </div>
                                    <div class='row'>
                                        <div class='cols-sm-1'>
                                        </div>
                                        <div class='col-sm-10'>
                                            <p class='content'>$complaint</p>
                                        </div>
                                        <div class='col-sm-1'>
                                        </div>
                                    </div>
                                    <div class='row'>
                                        <div class='cols-sm-4'>
                                        </div>
                                        <div class='col-sm-8'>
                                            <strong style='color:green; font-size:16px;'>REPLY : </strong><span style='font-size=18px; color:blue'>$reply</span>
                                        </div>
                                        
                                    </div>
                            </div> 
                            </div>
                            <div class='col-sm-2'>
                            </div>
                        </div>
                        </div>
                    
                    ";
                    
                }
                
            }
            

            ?>
            
       </div>
    </body>
</html>

