<?php
session_start();
include('../variables/string_variables.php');
include('../config/configure.php');

if(isset($_SESSION['student_email'])){
    include('../config/student_header.php');
}
else if(isset($_SESSION['admin_email'])){
    include('../config/admin_header.php');
}
else if(isset($_SESSION['staff_phone'])){
    include('../config/staff_header.php');
}
else{
    header("location:../index.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=window-width initial-scale = 1.0">
        <title>Feed Back</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
        <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
        <!-- <link rel="stylesheet" type="text/css" href="style/index.css">  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../style/signinStudent.css">
        <link rel="stylesheet" type="text/css" href="../style/footer.css">
    </head>
    <style>
        .well{
            cursor: pointer;
        }
        .btn{
            margin-right:20vw;
        }
    </style>
    <body style="background-image: url('../images/MegaTron.jpg')">
        
       <div class="row">
           <div class="col-sm-12">
               <center><h2>Your Feedback is important to us</h2></center>   
           </div>
       </div>
       <br><br>
       <div class="row">
           <div class="col-sm-2">
           </div>
           <div class="col-sm-8">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="feeback" class="form-group-item">Text Here
                        <textarea name="feedback" id="" placeholder="Enter your feedback" cols="120" rows="5"></textarea></label>
                    </div><br><br>
                    <button class="btn btn-info" name="submit" type="submit" style="margin-left: 500px">Submit</button>
                    <?php
                        if(isset($_POST['submit'])){
                            $feedback = $_POST['feedback'];
                            $insert  = "insert into feedback (content) values ('$feedback')";
                            $run_insert = mysqli_query($con, $insert);

                            if($run_insert){
                                echo("<script>alert('feedback added')</script>");
                            }
                            else{
                                echo("<script>alert('Unable to add feedback something wrong in database')</script>");
                            }
                        }
                    ?>
                </form>
           </div>
           <div class="cols-sm-2">

           </div>
       </div>
       
    </body>
</html>

<script>
    document.getElementById("well").onclick = function(){
        window.open('../index.php', '_self');
    }
</script>