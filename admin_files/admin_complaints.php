<!DOCTYPE html>
<?php

session_start();

if(isset($_SESSION['admin_email'])){
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
        <title>Complaints</title>
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
        .contain{
            width: 50%;
            height: 75px;
            border:2px solid violet;
            border-radius: 20px;
        
        }
        .inner{
            position: absolute;
            left: 25%;
            top: 50%;
            transform: translate(-50%, -50%);
            font-size: 18px;
            font-weight: bold;
            border:hidden;
            background-color: inherit;
        }
        .contain:hover{
            background-color: violet;
            border:3px solid black;
            box-shadow: 5px 10px 5px grey;
        }

        .complaint{
            border:3px solid violet;
            border-radius: 20px;
            margin:20px;
            padding: 30px 40px;
        }
    </style>

    <body>
        <div class="container-fluid">
            <div class="row">
                <center><h2>See Recent Complaints</h2></center>
            </div><br>
            <form action="" method="post">
                <div class="row">
                    <div class="col-sm-2">
                        <h3 style="float:right">Click Here</h3>
                    </div>
                    <div class="col-sm-3">
                        <div class="contain" id="mess">
                            <button class="inner" type="submit" name="mess">
                                Mess Complaints
                            </button>
                            
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="contain" id="room">
                            <button class="inner" type="submit" name="room">
                                Room Service Complaints
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="contain" id="room">
                            <button class="inner" type="submit" name="replied">
                                Replied Complaints
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-1">

                    </div>
                </div><br><hr>
            </form>

            <?php
                if(isset($_POST['mess'])){
                    admin_show_messcomplaints();
                }
                else if(isset($_POST['room'])){
                    admin_show_roomcomplaints();
                }
                else if(isset($_POST['replied'])){
                    admin_show_repliedcomplaints();
                }
                else{
                    admin_show_topcomplaints();
                }
            ?>
        </div>
    </body>
</html>

<?php

?>