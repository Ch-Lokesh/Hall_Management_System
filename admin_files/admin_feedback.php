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
        <title>Feed Back</title>
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
        #feed{
            border:2px solid violet;
            border-radius: 20px;
            margin:10px;
            padding:10px;
            width: 70%;
        }

        #feed:hover{
            background-color: lightgreen;
            font-family: bold;
            font-size: 18px;
        }
    </style>
    <body>
       <div class="row">
           <div class="col-sm-12">
               <center><h2>Feedback From users</h2></center>
           </div>
       </div><br><br>

       <?php
        $feed = "select * from feedback ORDER BY 1 DESC LIMIT 20";
        $run_feed = mysqli_query($con, $feed);   
       ?>
       <div class="row">
           <div class="col-sm-3">
           </div>
           <div class="col-sm-8">
                <?php
                while($row_feed = mysqli_fetch_array($run_feed)){
                    $content = $row_feed['content'];
                    
                    echo"
                        <div id='feed'>
                            $content
                        </div>
                    ";
                }

                
                ?>
           </div>
           
       </div>
    </body>
</html>