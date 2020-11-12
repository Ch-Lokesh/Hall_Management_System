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
        <title>Messages</title>
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
        .sel{
            border:2px solid lightcoral;
            border-radius: 40px;
        }
        .sel:hover{
            box-shadow: lightcoral 5px 20px 15px;
        }
        .pad{
            padding:20px 20px 30px 40px;
        }
        .con{
            border:1px solid violet;
            border-radius:30px;
            margin: auto;
            
        }
        .con:hover{
            background-color:violet;
            color:black;
        }
        .msg{
            transform: translateY(-8%);
        }
    </style>

    <body>
       <div class="row pad">
           <div class="col-sm-12">
               <center><h1>Select Here</h1></center>
           </div>
       </div>
       <div class="row">
           <div class="col-sm-2">
           </div>
           <div class="col-sm-3">
                <div class="container-fluid sel pad" id="student">
                    <div class="row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                        <img src="../images/stu3.png" alt="" style="max-width: 100px; max-height:100px">
                        </div>
                        <div class="col-sm-4">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-10 con">
                            <center><h2 class='msg'>Student Messages</h2></center>
                        </div>
                        <div class="col-sm-1">
                        </div>
                    </div>
                </div>
           </div>
           <div class="col-sm-1">
           </div>
           <div class="col-sm-3">
                <div class="container-fluid sel pad" id="admin">
                    <div class="row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                        <img src="../images/admin1.png" alt="" style="max-width: 100px; max-height:100px">
                        </div>
                        <div class="col-sm-4">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-10 con">
                            <center><h2 class='msg'>Admin Messages</h2></center>
                        </div>
                        <div class="col-sm-1">
                        </div>
                    </div>
                </div>
           </div>
           <div class="col-sm-3">
           </div>
       </div>
    </body>
</html>
<?php
if(isset($_GET['stu_id'])){
    $stu_id = $_GET['stu_id'];
}
?>
<script>
    document.getElementById("student").onclick = function(){
        window.open('only_student_messages.php', '_self');
    }
    document.getElementById("admin").onclick = function(){
        window.open('student_messeges.php?<?php echo"stu_id=$stu_id"?>' , '_self');
    }
</script>