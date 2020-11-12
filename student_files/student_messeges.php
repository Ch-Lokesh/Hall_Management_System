<!DOCTYPE html>
<?php
    session_start();
    if(isset($_SESSION['student_email'])){
        include("../config/student_header.php");
    }
    else if(isset($_SESSION['staff_phone'])){
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
        <title>Messeges</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
            overflow:scroll;
        }
        .body{
            padding:10px;
            margin:2px;
        }
        
        #green{
            background-color: #2ecc71;
            border-color: #27ae60;
            width:45%;
            padding: 2.5px;
            font-size: 16px;
            border-radius: 3px;
            float:left;
            
            height: 40px;
        }
        #blue{
            background-color: #3498db;
            border-color: #2980b9;
            width:45%;
            padding: 2.5px;
            font-size: 16px;
            border-radius: 3px;
            float:right;
            margin-bottom: 5px;
        }
        .tb{
            margin-left:50px;
        }
    </style>
    <body>
        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8">
                <center><h2>Messeges From Admin</h2></center><br><br>
                
                <div class="row">
                    <div class="col-sm-1">
                    </div>
                    <div class="col-sm-10">
                        <?php
                            $stu_id = $_GET['stu_id'];

                            $select = "select * from messeges where user_type = 'student' and user_id = '$stu_id'";
                            $run_msg = mysqli_query($con, $select);

                            while($row_msg = mysqli_fetch_array($run_msg)){
                                $msg_date = $row_msg['msg_date'];
                                $msg_body = $row_msg['msg_body'];
                                echo"
                                    <div style='background-color:lightgreen; height:40px; width:80%; font-size:20px; border-radius:20px;'>
                                        <div class='body'>$msg_body</div>
                                    </div><br><br>
                                ";
                            }

                            if(isset($_SESSION['student_email'])){
                                $update = "update messeges set msg_seen='yes' where user_id='$stu_id' and user_type='student'";
                                $run_update = mysqli_query($con, $update);
                            }
                            
                            
                        ?>
                    </div>
                    <div class="col-sm-1">
                    </div>
                </div>
            
                </div>
                <div class="col-sm-2">
            </div>
        </div>
        
    <?php
        if(isset($_SESSION['admin_email'])){

            $admin_email = $_SESSION['admin_email'];
            $select_admin = "select * from admin where admin_email = '$admin_email'";
            $run_email = mysqli_query($con, $select_admin);
            $row_admin = mysqli_fetch_array($run_email);

            $admin_id = $row_admin['admin_id'];
        echo"
            <div class='row'>
                <div class='col-sm-2'>
                </div>
                <div class='col-sm-8'>
                    <form action='' method='post'>
                    
                        <label for='reply' style='color:grey; font-size:18px;'>Text Here
                        <textarea name='content' class='form-control tb' cols='100' placeholder='Enter your message here'></textarea></label>
                        <br><br>
                        <center><button class='btn btn-success btn-lg' name='reply' type='submit'>Reply</button></center>
            ";
            ?>
                        <?php
                            if(isset($_POST['reply'])){
                                $reply = $_POST['content'];
                            

                                $insert = "insert into messeges (user_id, user_type, admin_id, msg_body, msg_seen) values
                                ($stu_id, 'student', '$admin_id', '$reply', 'no')";

                                $run_insert = mysqli_query($con, $insert);
                                
                                if($run_insert){
                                    echo"<script>window.open('student_messeges.php?stu_id=$stu_id', '_self');</script>";
                                }

                            }
                        ?>
            <?php
                echo"
                    </form>
                    
                </div>
                <div class='col-sm-2'>
                </div>
            </div>
        ";
        }
        
    ?>
    </body>
            
</html>

