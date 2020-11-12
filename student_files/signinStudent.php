<?php
include('../variables/string_variables.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=window-width initial-scale = 1.0">
        <title>HMS</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
        <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
        <!-- <link rel="stylesheet" type="text/css" href="style/index.css">  -->
        <link rel="stylesheet" type="text/css" href="../style/signinStudent.css">
    </head>
    
    <body style="background-image: url('../images/MegaTron.jpg')">
       <div class="row">
           <div class="col-xs-12">
               <div class="well" id="ind" style="cursor: pointer;">
                   <center><h1 style="color:white"><?php echo($hall_name) ?></h1></center>
               </div>
           </div>
       </div>
       <div class="row">
           <div class="col-sm-12">
               <div class="main-content">
                   <div class="header">
                       <h3 style="text-align: center"><strong>
                           Login As Student
                       </strong></h3>
                   </div>
                   <div class="l-part">
                       <form action="" method="post">
                           <input type="email" name="student_email" placeholder="Enter your email"
                            required="required" class="form-control input-md"><br>
                            <div class="overlap-text">
                                <input type="password" placeholder="password" class="form-control input-md"
                                 name ="student_pass" required ="require"><br>
                                <a href="forgot_password.php" style="float:right; text-decoration:none;"
                                 data-toggle="tooltip" title="Reset password">Forgot ?</a>
                            </div>
                            <a href="signupStudent.php" style="float:left; text-decoration:none;" data-toggle="tooltip" title="Sign Up">
                            New Here?</a><br><br>
                            <center>
                                <button id="signin" class="btn btn-info btn-lg" name="stu_sign_in">Log In</button>
                            </center>
                            <?php include("student_login.php"); ?>
                       </form>
                   </div>
               </div>
           </div>
       </div>
    </body>
</html>

<script>
document.getElementById("ind").onclick = function(){
    window.open('../index.php', '_self');
}
</script>