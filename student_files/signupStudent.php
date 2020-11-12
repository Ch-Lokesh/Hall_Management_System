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
        <link rel="stylesheet" type="text/css" href="../style/signupStudent.css">
    </head>

    <body style="background-image: url('../images/MegaTron.jpg')">
        <header class="header padding">
        <div class="row padding">
            <div class="col-xs-3 one">
                <img src="../images/logo.jpg" alt="" style="max-width: 100; max-height:100%">
            </div>
            <div class="col-xs-9 two">
                <div class="content" id="hall_name" style="cursor: pointer" >
                    <div class="mid" id="hall" ><?php echo($hall_name) ?></div>
                </div>
            </div>
        </div>
        </header>
       <div class="container-fluid">
           <form action="" class="form-horizontal" method="POST" role="form">
               <h2>Registration</h2>
               <div class="form-group">
                   <label for="firstName" class="col-sm-3 control-label">First Name</label>
                   <div class="col-sm-9">
                       <input type="text" id="firstName" placeholder="First Name" name="first_name" class="form-control" required>
                   </div>
               </div>

               <div class="form-group">
                   <label for="lastName" class="col-sm-3 control-label">Last Name</label>
                   <div class="col-sm-9">
                       <input type="text" id="lastName" placeholder="Last Name" class="form-control" name="last_name" required>
                   </div>
               </div>

               <div class="form-group">
                   <label for="email" class="col-sm-3 control-label">Email*</label>
                   <div class="col-sm-9">
                       <input type="email" id="email" placeholder="someone@something.com" name="student_email" class="form-control" required>
                   </div>
               </div>

               <div class="form-group">
                   <label for="password" class="col-sm-3 control-label">Password*</label>
                   <div class="col-sm-9">
                       <input type="password" id="password" placeholder="Password" class="form-control" name="student_pass" required>
                   </div>
               </div>

               <div class="form-group">
                   <label for="password" class="col-sm-3 control-label"> Confirm Password*</label>
                   <div class="col-sm-9">
                       <input type="password" id="password" placeholder="Password" class="form-control" name="student_pass1" required>
                   </div>
               </div>

               <div class="form-group">
                   <label for="birthDate" class="col-sm-3 control-label">Date of Birth*</label>
                   <div class="col-sm-9">
                       <input type="date" id="birthDate"  class="form-control" name="student_birthday" required>
                   </div>
               </div>

               <div class="form-group">
                   <label for="phoneNumber" class="col-sm-3 control-label">Pone Number*</label>
                   <div class="col-sm-9">
                       <input type="phoneNumber" id="phoneNumber" placeholder="enter 10 digits" class="form-control" name="student_phone" required>
                   </div>
               </div>

               <div class="form-group">
                   <label for="rollNumber" class="col-sm-3 control-label">Roll Number*</label>
                   <div class="col-sm-9">
                       <input pattern='[1-9][0-9][A-Z]{2}[0-9]{5}' title="Enter correct rool no" type="text" id="rollNumber"  class="form-control" name="roll_no" placeholder="15CS10010"  required>
                   </div>
               </div>

               <div class="form-group">
                    <label class="control-label col-sm-3">Gender</label>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="radio-inline">
                                    <input type="radio" id="femaleRadio" value="Female" name="student_gender">Female
                                </label>
                            </div>
                            <div class="col-sm-3">
                                <label class="radio-inline">
                                    <input type="radio" id="maleRadio" value="Male" name="student_gender">Male
                                </label>
                            </div>
                            <div class="col-sm-3">
                                <label class="radio-inline">
                                    <input type="radio" id="otherRadio" value="Other" name="student_gender">Other
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <center><button type="submit" class="btn btn-primary btn-block" name="stu_sign_up">Register</button></center>
                <?php include("insert_student.php"); ?>
           </form>
       </div>


    </body>

</html>

<script>
document.getElementById("hall_name").onclick = function(){
    window.open('../index.php', '_self');
}
</script>