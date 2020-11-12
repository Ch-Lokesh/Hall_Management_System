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
        <link rel="stylesheet" type="text/css" href="../style/signupStaff.css">
    </head>

    <body style="background-image: url('../images/MegaTron.jpg')">
        <header class="header padding">
        <div class="row padding">
            <div class="col-xs-3 one">
                <img src="../images/logo.jpg" alt="" style="max-width: 100; max-height:100%">
            </div>
            <div class="col-xs-9 two">
                <div class="content" id="wel" style="cursor: pointer;">
                    <div class="mid"><?php echo($hall_name) ?></div>
                </div>
            </div>
        </div>
        </header>
       <div class="container-fluid">
           <form action="" class="form-horizontal" method="POST" role="form">
               <h2>Register as STAFF</h2>
               <div class="form-group">
                   <label for="firstName" class="col-sm-3 control-label">First Name</label>
                   <div class="col-sm-9">
                       <input type="text" id="firstName" placeholder="First Name" class="form-control" name="first_name" autofocus>
                   </div>
               </div>

               <div class="form-group">
                   <label for="lastName" class="col-sm-3 control-label">Last Name</label>
                   <div class="col-sm-9">
                       <input type="text" id="lastName" placeholder="Last Name" class="form-control" name="last_name" autofocus>
                   </div>
               </div>

               <div class="form-group">
                   <label for="job" class="col-sm-3 control-label">Job*</label>
                   <div class="col-sm-9">
                       <!-- <input type="text" id="job" placeholder="job" class="form-control" name="staff_job" autofocus> -->
                       <select name="staff_job" id="job" class="form-control">
                           <option value="" disabled>Select Your Job</option>
                           <option value="mess">mess</option>
                           <option value="room_service">room service</option>
                       </select>
                   </div>
               </div>

               <div class="form-group">
                   <label for="password" class="col-sm-3 control-label">Password*</label>
                   <div class="col-sm-9">
                       <input type="password" id="password" placeholder="Password" class="form-control" name="staff_pass" autofocus required>
                   </div>
               </div>

               <div class="form-group">
                   <label for="password" class="col-sm-3 control-label"> Confirm Password*</label>
                   <div class="col-sm-9">
                       <input type="password" id="password" placeholder="Password" class="form-control" name="staff_pass1" autofocus required>
                   </div>
               </div>

               <div class="form-group">
                   <label for="birthDate" class="col-sm-3 control-label">Date of Birth*</label>
                   <div class="col-sm-9">
                       <input type="date" id="birthDate"  class="form-control" name="staff_birthday" autofocus>
                   </div>
               </div>

               <div class="form-group">
                   <label for="phoneNumber" class="col-sm-3 control-label">Pone Number*</label>
                   <div class="col-sm-9">
                       <input type="phoneNumber" id="phoneNumber" placeholder="enter 10 digits" class="form-control" name="staff_phone" autofocus required>
                   </div>
               </div>

               <div class="form-group">
                    <label class="control-label col-sm-3">Gender</label>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-1">

                            </div>
                            <div class="col-sm-3">
                                <label class="radio-inline">
                                    <input type="radio" id="femaleRadio" value="Female" name="staff_gender" >Female
                                </label>
                            </div>
                            <div class="col-sm-3">
                                <label class="radio-inline">
                                    <input type="radio" id="maleRadio" value="Male" name="staff_gender">Male
                                </label>
                            </div>
                            <div class="col-sm-3">
                                <label class="radio-inline">
                                    <input type="radio" id="otherRadio" value="Other" name="staff_gender">Others
                                </label>
                            </div>
                            <div class="col-sm-1">

                            </div>

                        </div>
                    </div>
                </div>
                <center><button type="submit" class="btn btn-primary btn-block" name="staff_sign_up">Register</button></center>
                <?php include("insert_staff.php") ?>
           </form>
       </div>


    </body>

</html>

<script>
    document.getElementById("wel").onclick = function(){
        window.open('../index.php' , '_self')
    }
</script>