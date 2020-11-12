<!DOCTYPE html>
<?php
session_start();
include("../config/student_header.php");
if(!isset($_SESSION['student_email'])){
    header("location:(../index.php)");
}
?>
<html>
    <head>
        <meta charset ="utf-8">
        <meta name="viewport" content="width=divice-width, initial-scale = 1.0">
        <title>Student Messages</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../style/home.css">
        <link rel="stylesheet" type="text/css" href="../style/footer.css">
    </head>
    <style>
        body{
            background-image: url('../images/MegaTron.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            overflow-x: hidden;
        }

        #scroll_messages{
            max-height: 500px;
            overflow: scroll;
        }

        #btn-msg{
            width: 15%;
            height: 35px;
            border-radius: 10px;
            margin: 5px;
            border:none;
            color: #fff;
            float: right;
            background-color: #2ecc71;
            padding-bottom: 5px;
        }

        #select_user{
            max-height: 500px;
            overflow:scroll;
        }

        #green{
            background-color: lightgreen;
            border-color: #27ae60;
            width: 45%;
            padding: 2.5px;
            font-size: 16px;
            border-radius: 3px;
            float:left;
            margin-bottom: 5px;
        }

        #blue{
            background-color: lightblue;
            border-color: #2980b9;
            width: 45%;
            padding: 2.5px;
            font-size: 16px;
            border-radius: 3px;
            float:right;
            margin-bottom: 5px;
        }
    </style>
    <?php
        if(isset($_GET['stu_id'])){
            global $con;

            $get_id = $_GET['stu_id'];

            $get_student = "select * from students where student_id='$get_id'";
            $run_student = mysqli_query($con ,$get_student);
            $row_student = mysqli_fetch_array($run_student);

            $stu_to_msg = $row_student['student_id'];
            $stu_to_name = $row_student['student_name'];
        }


            $user = $_SESSION['student_email'];
            $get_student = "select * from students where student_email = '$user'";
            $run_student = mysqli_query($con, $get_student);
            $row = mysqli_fetch_array($run_student);

            $stu_from_msg = $row['student_id'];
            $stu_from_name = $row['student_name'];
    ?>

    <body>
       <div class="row">
           <div class="col-sm-3" id="select_user">
               <?php
                    $students = "select * from students";
                    $run_students = mysqli_query($con, $students);
                
                    while($row = mysqli_fetch_array($run_students)){
                        $student_id = $row['student_id'];
                        $student_name = $row['student_name'];
                        $first_name = $row['first_name'];
                        $last_name = $row['last_name'];
                        $student_image = $row['student_image'];

                        echo"
                            <div class='container-fluid'>
                                <a style='text-decoration:none; cursor:pointer; color:#3897F0; font-size:18px;' href='only_student_messages.php?stu_id=$student_id'>
                                <img class='img-circle' src='../$student_image' width='90px' height='80px' title='$student_name'><strong>&nbsp $first_name $last_name</strong><br></a>
                            </div><br><br>

                        ";
                    }   
               ?>
           </div>

           <div class="col-sm-6">
               <div class="load_msg" id="scroll_messages">
               <?php
               if(isset($_GET['stu_id'])){
                    $sel_msg = "select * from stu_messages where (stu_to='$stu_to_msg' AND stu_from='$stu_from_msg') OR (stu_from='$stu_to_msg' AND stu_to='$stu_from_msg') ORDER by 1 ASC";
                    $run_msg = mysqli_query($con, $sel_msg);

                    while($row_msg = mysqli_fetch_array($run_msg)){

                        $stu_to = $row_msg['stu_to'];
                        $stu_from = $row_msg['stu_from'];
                        $msg_body = $row_msg['msg_body'];
                        $msg_date = $row_msg['msg_date'];

                        ?>
                        <div>
                            <p><?php if($stu_to == $stu_to_msg AND $stu_from == $stu_from_msg){
                                echo"
                                    <div class='message' id='blue' data-toggle='tooltip' title='$msg_date'>
                                        $msg_body
                                    </div><br><br>
                                ";
                            }
                            else if($stu_from == $stu_to_msg AND $stu_to == $stu_from_msg){
                                echo"
                                    <div class='message' id='green' data-toggle='tooltip' title='$msg_date'>
                                        $msg_body
                                    </div><br><br>
                                ";
                            }
                            ?></p>
                        </div>

                        <?php
                    }
                    }
                        
                    ?>
               </div>

               <?php
                    if(!isset($_GET['stu_id'])){
                        echo"
                            <form action=''>
                                <center><h3>Select any one to message</h3></center>
                                <textarea disabled name='' class='form-control'placeholder='Eenter you message'></textarea>
                                <input type='submit' class='btn btn-default' disabled value='Send'>
                            </form><br>
                            
                        ";
                    }
                    else{
                        echo"
                        <form action='' method='POST'>
                            <textarea name='msg_box' class='form-control' placeholder='Eenter you message'></textarea>
                            <input type='submit'  class='btn btn-default' style='font-size: 16px' id='btn-msg' name='send_msg' value='Send'>
                        </form><br>
                        
                        ";
                    }
                ?>

                <?php
                    if(isset($_POST['send_msg'])){
                        $msg = htmlentities($_POST['msg_box']);
                        if($msg == ""){
                            echo("<h4 style='color:red'>Unable to send empty message</h4>");
                        }
                        else if(strlen($msg) > 30){
                            echo("<h4 style='color:red'>Message is too long, please enter less than 30 chars</h4>");
                        }
                        else{
                            $insert = "insert into stu_messages (stu_to, stu_from, msg_body, msg_date, msg_seen)
                            values ('$stu_to_msg', '$stu_from_msg', '$msg', NOW(), 'no')";

                            $run_insert = mysqli_query($con, $insert);
                            if($run_insert){
                                echo"<script>window.open('only_student_messages.php?stu_id=$get_id', '_self')</script>";
                            }
                            else{
                                echo"<script>window.alert('Opps error in database')</script>";
                            }
                        }
                    }
                ?>
           </div>
            
           <div class="col-sm-3">
               <?php
                    if(isset($_GET['stu_id'])){
                        global $con;

                        $get_id = $_GET['stu_id'];
                        
                        $get_student ="select * from students where student_id='$get_id'";
                        $run_student = mysqli_query($con, $get_student);
                        $row = mysqli_fetch_array($run_student);

                        
                        $student_image = $row['student_image'];
                        $student_name = $row['student_name'];
                        $first_name = $row['first_name'];
                        $last_name = $row['last_name'];
                        $student_email = $row['student_email'];
                        $student_phone = $row['student_phone'];
                        $student_birthday = $row['student_birthday'];
                        $student_gender = $row['student_gender'];
                        $student_reg_date = $row['student_reg_date'];


                        echo"
                            <div class='row'>
                                <div class='col-sm-2'>
                                </div>
                                <center>
                                    <div style='background-color:#e6e6e6;' class='col-sm-9'>
                                        <h2>Information About</h2>
                                        <img src='../$student_image' width='150' height='150' class='img-circle'>
                                        <br>
                                        <ul class='list-group'>
                                            <li class='list-group-item' title='User Name'>
                                                <strong>$first_name $last_name</strong>
                                            </li>
                                            <li class='list-group-item' title='Student Email'>
                                                <strong style='color:grey'>$student_email</strong>
                                            </li>
                                            
                                            <li class='list-group-item' title='Student Phone'>
                                                <strong >$student_phone</strong>
                                            </li>
                            
                                            <li class='list-group-item' title='Student Birthday'>
                                                <strong >$student_birthday</strong>
                                            </li>
                            
                                            <li class='list-group-item' title='Student Gender'>
                                                $student_gender
                                            </li>
                            
                                            <li class='list-group-item' title='Registration Date'>
                                                $student_reg_date
                                            </li>
                                        
                                            
                                        </ul>
                                    </div>
                                </center>
                                <div class='col-sm-1'>
                                </div>
                            </div>
                        ";
                    }
               ?>
           </div>
       </div>
       
    </body>
</html>

