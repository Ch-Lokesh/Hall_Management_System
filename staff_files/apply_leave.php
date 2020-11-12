<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['staff_phone'])){
    include("../config/staff_header.php");
}
else if(isset($_SESSION['admin_email'])){
    include("../config/admin_header.php");
}

else{
    header("location:../index.php");
}
?>
<html>
    <head>
       
        <meta charset ="utf-8">
        <meta name="viewport" content="width=divice-width, initial-scale = 1.0">
        <title>Apply For Leave</title>
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

        .leave{
            border:3px solid violet;
            border-radius:10px;
            width:80%;
            font-size:20px;
            margin:10px;
        }

        .per{
            border:2px solid blue;
            background-color: lightgreen;
            margin:10px;
            padding:5px;
            border-radius: 20px;
        }
    </style>

    <body>
       <div class="row">
           <div class="col-sm-12">
               <center><h2>Leave Application</h2></center>
           </div>
           <div class="row">
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-6">
                            <form action="" method="post">
                                <button class="btn btn-primary" name="pre" type="submit">Previous Applications</button>
                            </form>
                        </div>
                        <div class="col-sm-2">
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-sm-2">
                        
                        </div>
                        <div class="col-sm-10">
                            <?php
                                $staff_id = $_GET['staff_id'];
                                if(isset($_POST['pre'])){
                                    $select = "select * from leave_applications where staff_id = '$staff_id' ORDER by 1 DESC LIMIT 3";
                                    $run_select = mysqli_query($con, $select);
                                    
                                    while($row = mysqli_fetch_array($run_select)){

                                        $from_date = $row['from_date'];
                                        $to_date = $row['to_date'];
                                        $reason = $row['reason'];
                                        $permission = $row['permission'];
                                        
                                        echo"
                                        <div class='leave'>
                                        <br>
                                            <div class='row'>
                                                <div class='col-sm-1'></div>
                                                <div class='col-sm-5 da'>
                                                    <strong>Applied From : </strong><p>$from_date</p>
                                                </div>
                                                <div class='col-sm-5 da'>
                                                    <strong>Applied to : </strong><p>$to_date</p>
                                                </div>
                                                <div class='col-sm-1'></div>
                                            </div><hr style='color:black; border:2px solid black'>
                                            <div class='row'>
                                                
                                                <div class='col-sm-10 reason'>
                                                    <center>$reason</center>
                                                </div>
                                                
                                            </div><br><br>
                                            <div class='row'>
                                                <div class='col-sm-2'></div>
                                                <div class='col-sm-6 per'>
                                                <center>
                                        ";      
                                                if($permission == 'yes'){
                                                    echo"Approved";
                                                }
                                                else if($permission == 'notyet'){
                                                    echo"Not Reviewed";
                                                }
                                                else{
                                                    echo"Rejected";
                                                }
                                        echo"
                                        </center>
                                                </div>
                                                <div class='col-sm-3'></div>
                                            </div>
                                        </div>
                                        
                                        ";

                                    }
                                }
                            ?>
                        </div>
                        
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-8">
                            <form action="" method="post">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="from_date" style="color:grey; font-size:20px;font-family:Arial, Helvetica, sans-serif">Apply leave from date :</label>
                                        <input type="date" name="from_date" class="form-control in-line">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="to_date" style="color:grey; font-size:20px;font-family:Arial, Helvetica, sans-serif">Apply leave upto date : </label>
                                        <input type="date" name="to_date" class="form-control in-line">
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-sm-1">

                                    </div>
                                    <div class="col-sm-10">
                                        <label for="reason" style="color:black; font-size:20px; font-family:Arial, Helvetica, sans-serif">Reason :</label>
                                        <textarea name="reason" style="width: 100%" placeholder="Reasson"></textarea>
                                    </div>
                                    <div class="col-sm-1">
                                    </div>
                                </div><br><br>
                                    <div class="row">
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-10">
                                            <center>
                                                <button class="btn btn-info" name="apply" type="submit">Apply</button>
                                            </center>
                                        </div>
                                        <div class="col-sm-1">
                                        </div>
                                    </div>
                                
                                <?php
                                    if(isset($_POST['apply'])){
                                        $staff_id = $_GET['staff_id'];
                                        $from_date = $_POST['from_date'];
                                        $to_date = $_POST['to_date'];
                                        $reason = $_POST['reason'];
                                        $permission = "notyet";

                                        $insert = "insert into leave_applications (staff_id, reason, from_date, to_date, permission) values 
                                        ('$staff_id', '$reason', '$from_date', '$to_date', '$permission')";

                                        $run_insert = mysqli_query($con, $insert);
                                        if($run_insert){
                                            echo"<script>alert('Your application registered')</script>";
                                        }
                                        else{
                                            echo"<script>alert('Unable to register, Something is wrong in database')</script>";
                                        }
                                    }

                                ?>
                            </form>
                        </div>
                        <div class="col-sm-3">
                        </div>
                    </div>
                </div>
           </div>
       </div>
    </body>
</html>

