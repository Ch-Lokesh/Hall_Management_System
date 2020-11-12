<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['student_email'])){
    include("../config/student_header.php");
}
else if (isset($_SESSION['admin_email'])){
    include("../config/admin_header.php");
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
        <title>Mess</title>
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
            background-size: cover;
            background-repeat: no-repeat;
        }
        .tb th{
            text-align: center;
            border:2px solid black;
        }
        .tb td{
            font-weight: 200;
            font-size: 2rem;
            border:2px solid black;
        }
        .tb tr{
            border:2px solid black;
        }
        table, td , th{
            border:3px solid black;
        }
        table{
            min-height: 99vh;
        }
        .tb td{
            padding: 10px;
        }
        .data:hover{
            box-shadow: 4px 9px 7px 9px black ; 
        }
        
        .tb th{
            font-size: 2rem;
        }
        
        
    </style>

    <body>
       <div class="row">
           <center><h1>Current Mess Menu</h1></center><br><br>
       </div>
       <div class="row">
           <div class="col-sm-1">
           </div>
           <div class="col-sm-10">
                <table class="table table-dark tb">
                    <tr>
                        <th rowspan="2">Day</th>
                        <th colspan="2">Break Fast</th>
                        <th colspan="2">Lunch</th>
                        <th rowspan="2">Snacks</th>
                        <th colspan="2">Dinner</th>
                    </tr>
                    <tr style="text-align: center;">
                        <th>Option 1</th>
                        <th>Option 2</th>
                        <th>VEG</th>
                        <th>NON VEG</th>
                        <th>VEG</th>
                        <th>NON VEG</th>
                    </tr>
                    <?php
                        $i;
                        for($i = 1; $i <= 7; $i++){
                            $data = "select * from menu where dayNo=$i";
                            $query = mysqli_query($con, $data);
                            $row = mysqli_fetch_array($query);
                    ?>

                            
                        <tr class = "data">
                            <td class="day"><?php echo$row['day']; ?></td>
                            <td><?php echo$row['break_op1']; ?></td>
                            <td><?php echo$row['break_op2']; ?></td>
                            <td><?php echo$row['lunch_veg']; ?></dh>
                            <td><?php echo$row['lunch_nonveg']; ?></td>
                            <td><?php echo$row['snacks']; ?></td>
                            <td><?php echo$row['dinner_veg']; ?></dh>
                            <td><?php echo$row['dinner_nonveg']; ?></td>
                        </tr>
                        

                        <?php
                        }
                    ?>
                </table>
           </div>
           <div class="col-sm-1">
           </div>
       </div>
       <!-- <hr style="border:2px solid grey;"> -->
       <?php
       if(isset($_SESSION['student_email'])){
        ?>
       <div class="row">
           <div class="col-sm-12">
               <center><h1>Suggestions or Complaints</h1></center>
           </div>
       </div>
       <div class="row">
           <div class="col-sm-2">
           </div>
           <div class="col-sm-8">
                <form action="" method="post">
                    <div class="form-group">
                        <label style="color: black; font-size:2rem;">Write your Suggessions or Complaints</label>
                        <textarea style="font-size: 2rem;" name="complaint" class="form-control" placeholder="write here"></textarea>
                    </div>
                    <center><button type="submit" name="make" class="btn btn-primary btn-lg">Submit</button></center>

                    <?php
                        if(isset($_POST['make'])){
                            $complaint = htmlentities(mysqli_real_escape_string($con, $_POST['complaint']));
                            $student_id = $_GET['stu_id'];
                            $reply = "";

                            $insert = "insert into mess_complaints (student_id, complaint, complaint_type, reply, date) values
                            ('$student_id', '$complaint', 'mess', '$reply', NOW())";
                            
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
       <?php
       }
       ?>

       <!-- <?php //include("../config/footer.php") ?> -->
    </body>
</html>