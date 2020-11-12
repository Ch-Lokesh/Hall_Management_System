<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['admin_email'])){
    include("../config/admin_header.php");
}

if(!isset($_SESSION['admin_email'])){
    header("location:../index.php");
}
?>

<html>
    <head>
        <meta charset ="utf-8">
        <meta name="viewport" content="width=divice-width, initial-scale = 1.0">
        <title>Leave Applications</title>
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

        .d{
            display: none;
        }
    </style>
    <body>
        <div class="row">
            <div class="col-sm-12">
                <center><h2>Staff Leave Applications</h2></center>
            </div>
        </div><br><br>
       <div class="row">
           <div class="col-sm-4">
           </div>
            <div class="col-sm-6">
                <?php
                    $select = "select * from leave_applications where permission='notyet' ORDER by 1 ASC";
                    $run_select = mysqli_query($con, $select);

                    while($row = mysqli_fetch_array($run_select)){

                        $leave_id = $row['id'];
                        $staff_id = $row['staff_id'];
                        $from_date = $row['from_date'];
                        $to_date = $row['to_date'];
                        $reason = $row['reason'];

                        $select_staff = "select * from staff where staff_id ='$staff_id'";
                        $run_staff = mysqli_query($con, $select_staff);
                        $row_staff = mysqli_fetch_array($run_staff);

                        $first_name = $row_staff['first_name'];
                        $last_name = $row_staff['last_name'];
                        $staff_image = $row_staff['staff_image'];

                        echo"
                            <div class='row'>
                                <div class='col-sm-2'>
                                </div>
                                <div class='col-sm-8' id='posts'>
                                    <div class='row'>
                                        <div class='col-sm-2'>
                                            <p><img src='../$staff_image' class='img-circle' width = '100px'
                                            height='100px' alt='staff image'></p>
                                        </div>
                                        <div class='col-sm-10'>
                                            <h3><a style='text-decoration:none ; cursor:pointer; color: #3897f0;'
                                            href='staff_profile.php?staff_id=$staff_id'>$first_name $last_name</a></h3>
                                            <h4><p style='color:black;'>Applied From date : <strong>$from_date</strong>  upto : <strong>$to_date</strong></p></h4>
                                            
                                        </div>
                                        
                                    </div>
                                    <div class='row'>
                                        <div class='col-sm-12'>
                                            <h3><center>$reason</center></h3>
                                        </div>
                                    </div><br>
                                    <div class='row'>
                                        <div class='col-sm-8'></div>
                                        <div class='col-sm-2'>
                                            <form action='' method='post'>
                                                <input  class='d' type='text' style='disable' name='permit_v' value='$leave_id'>
                                                <button class='btn btn-success' name='permit' id='permit'>Permit</button>
                                            </form>
                                        </div>
                                        <div class='col-sm-2'>
                                            <form action='' method='post'>
                                                <input class='d' type='text' style='disable' name='reject_v' value='$leave_id'>
                                                <button class='btn btn-danger' name='reject' id='reject'>Reject</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-sm-2'>
                                </div>
                            </div><br><br>
                        ";  
                    }

                ?>
            </div>
           <div class="col-sm-2">
           </div>
       </div>
    </body>
</html>

<?php
    if(isset($_POST['permit'])){
        $id = $_POST['permit_v'];
        $update = "update leave_applications set permission='yes' where id='$id'";
        $run_update = mysqli_query($con, $update);
        if($run_update){
            echo"<script>window.open('admin_applications.php', '_self')</script>";
        }
    }
    if(isset($_POST['reject'])){
        $id = $_POST['reject_v'];
        $update = "update leave_applications set permission='no' where id='$id'";
        $run_update = mysqli_query($con, $update);
        if($run_update){
            echo"<script>window.open('admin_applications.php', '_self')</script>";
        }
    }
?>



