<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['admin_email'])){
    include("../config/admin_header.php");
}
else if(isset($_SESSION['student_email'])){
    include("../config/student_header.php");
}

if(!isset($_SESSION['student_email']) && !isset($_SESSION['admin_email'])){
    header("location:../index.php");
}

?>
<html>
    <head>
        <meta charset ="utf-8">
        <meta name="viewport" content="width=divice-width, initial-scale = 1.0">
        <title>Members</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../style/home.css">
    </head>
    <style>
        body{
            
            background-image: url('../images/MegaTron.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .info{
            background-color: lightgrey;
            border:2px solid black;
            border-radius: 30px;
            padding:20px;
        }

        .info:hover{
            box-shadow: 5px 10px 6px black;
        }

        .info p{
            font-size:20px;
        }

        #find_people{
            margin:20px;
        }
    </style>
    <?php

        $select_students = "select * from students";
        $run_students = mysqli_query($con, $select_students);
        $num_students = mysqli_num_rows($run_students);

        $select_staff = "select * from staff";
        $run_staff = mysqli_query($con, $select_staff);
        $num_staff = mysqli_num_rows($run_staff);

        $select_ab_students = "select * from attendance where user_type = 'student' and date = CURDATE()";
        $run_students = mysqli_query($con, $select_ab_students);
        $num_ab_students = mysqli_num_rows($run_students);

        $select_ab_staff = "select * from attendance where user_type = 'staff' and date = CURDATE()";
        $run_staff = mysqli_query($con, $select_ab_staff);
        $num_ab_staff = mysqli_num_rows($run_staff);


    ?>
    <body>
        <div class="row">
            <div class="col-sm-12">
                <center><h2>Find Members</h2></center><br>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class='row'>
                    <div class='col-sm-1'>
                    </div>
                    <div class="col-sm-10 info" >
                        <center>
                            <p><strong>Today Present Students  :  </strong> <?php echo($num_students - $num_ab_students); ?></p>
                            <p><strong>Today Absent Students  :  </strong> <?php echo($num_ab_students); ?></p>
                            <p><strong>Total Students  :  </strong> <?php echo($num_students); ?></p><br>

                            <p><strong>Total Present Staff  :  </strong> <?php echo($num_staff - $num_ab_staff); ?></p>
                            <p><strong>Today Absent Staff  :  </strong> <?php echo($num_ab_staff); ?></p>
                            <p><strong>Total Staff  :  </strong> <?php echo($num_staff ); ?></p><br>

                            <p><strong>Total Present Members  :  </strong> <?php echo($num_students - $num_ab_students + $num_staff - $num_ab_staff); ?></p>
                            <p><strong>Today Absent Members  :  </strong> <?php echo($num_ab_students+ $num_ab_staff); ?></p>
                            <p><strong>Total Members  :  </strong> <?php echo($num_students+ $num_staff); ?></p><br><br>

                            <form action="" method="post">
                                <button class="btn btn-info" style="width: 80%; font-size:20px; color:black" type="submit" name="ab_members">See Absent Members</button>
                                
                            </form>
                        </center>
                    </div>
                    <div class="col-sm-1">
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-5">
                        <form action="" class="search_form" method="post">
                            <input type="text" name="search_student" placeholder="Search Student">
                            <button class="btn btn-info" type="submit" name="search_student_btn">Search Student</button>
                        </form>
                    </div>
                    <div class="col-sm-5">
                        <form action="" class="search_form" method="post" >
                            <input type="text" name="search_staff" placeholder="Search Staff">
                            <button class="btn btn-info" type="submit" name="search_staff_btn">Search Staff</button>
                        </form>
                    </div>
                    <div class="col-sm-2">
                    </div>
                </div><br><br>
                <?php
                    search_student();
                    search_staff();
                    search_absent();
                ?>
            
        </div>
            
            
        
    </body>
</html>