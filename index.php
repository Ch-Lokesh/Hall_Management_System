<?php
include('variables/string_variables.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HMS</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
        <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script> 
        <link rel="stylesheet" type="text/css" href="style/index.css">
    </head>

    <body >
        <header class="text-center header">
            <h2 class="welcome">Welcome to </h2>
            <h1 class="hall_name">Meghanad Saha Hall of Residence</h1>
        </header>
        <div class="container-fluid">
            <div class="row padding">
                <div class="col-sm-2">
                </div>
                <div class="card col-sm-4 text-center signup">
                    <div class="card-header">
                        Sign Up
                    </div>
                        
                    <div class="card-body">
                        <p class="text-center" style="font-size: medium;">
                                as
                        </p>
                            
                        <div class="row padding">
                            <div class="col-sm-3 one">
                                <img src="images/stu3.png" alt="" style="max-width: 100; max-height:100%">
                            </div>
                            <div class="col-sm-9 two">
                                <div class="content" id="signupStudent">
                                    <div class="mid">Student</div>
                                </div>
                            </div>
                        </div>

                        <div class="row padding">
                            <div class="col-sm-3 one">
                                <img src="images/staff2.png" alt="" style="max-width: 100; max-height:100%">
                            </div>
                            <div class="col-sm-9 two">
                                <div class="content" id="signupStaff">
                                    <div class="mid">Staff</div>
                                </div>
                            </div>
                        </div>

                        <div class="row padding">
                            <div class="col-sm-3 one">
                                <img src="images/admin1.png" alt="" style="max-width: 100; max-height:100%">
                            </div>
                            <div class="col-sm-9 two">
                                <div class="content" id="signupAdmin">
                                    <div class="mid">Admin</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="col-sm-1">
                </div>
                <!-- =======================================second card======================================== -->

                <div class="card col-sm-4 text-center signin">
                    <div class="card-header">
                        Sign In
                    </div>
                        
                    <div class="card-body">
                        <p class="text-center" style="font-size: medium;">
                                as
                        </p>
                            
                        <div class="row padding">
                            <div class="col-sm-3 one">
                                <img src="images/stu3.png" alt="" style="max-width: 100; max-height:100%">
                            </div>
                            <div class="col-sm-9 two">
                                <div class="content" id="signinStudent">
                                    <div class="mid">Student</div>
                                </div>
                            </div>
                        </div>

                        <div class="row padding">
                            <div class="col-sm-3 one">
                                <img src="images/staff2.png" alt="" style="max-width: 100; max-height:100%">
                            </div>
                            <div class="col-sm-9 two">
                                <div class="content" id="signinStaff">
                                    <div class="mid">Staff</div>
                                </div>
                            </div>
                        </div>

                        <div class="row padding">
                            <div class="col-sm-3 one">
                                <img src="images/admin1.png" alt="" style="max-width: 100; max-height:100%">
                            </div>
                            <div class="col-sm-9 two">
                                <div class="content">
                                    <div class="mid" id="signinAdmin">Admin</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-sm-1">
            </div>
            </div>
            
        </div>
    </body>

    
</html>

<script type="text/javascript">
    document.getElementById("signupStudent").onclick = function(){
        location.href="student_files/signupStudent.php"
    }
    document.getElementById("signupStaff").onclick = function(){
        location.href="staff_files/signupStaff.php"
    }
    document.getElementById("signupAdmin").onclick = function(){
        location.href="admin_files/signupAdmin.php"
    }
    document.getElementById("signinStudent").onclick = function(){
        location.href="student_files/signinStudent.php"
    }
    document.getElementById("signinStaff").onclick = function(){
        location.href="staff_files/signinStaff.php"
    }
    document.getElementById("signinAdmin").onclick = function(){
        location.href="admin_files/signinAdmin.php"
    }
    
</script>
