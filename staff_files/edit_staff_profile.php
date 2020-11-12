<!DOCTYPE html>
<?php
session_start();
include("../config/staff_header.php");
if(!isset($_SESSION['staff_phone'])){
    header("location:../index.php");
}
?>
<html>
    <head>
    
        <meta charset ="utf-8">
        <meta name="viewport" content="width=divice-width, initial-scale = 1.0">
        <title>Edit Account</title>
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
       
        
    </style>
    <body>
        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8">
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="table table-bordered table-hover">
                        <tr align="center">
                            <td colspan="6" class="active"><h2>Edit Your Profile</h2></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">First Name</td>
                            <td>
                                <input class = 'form-control' type="text" name="first_name" required value='<?php echo"$first_name" ?>'>
                            </td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold;">Last Name</td>
                            <td>
                                <input class = 'form-control' type="text" name="last_name" required value='<?php echo"$last_name" ?>'>
                            </td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold;">User Name</td>
                            <td>
                                <input class = 'form-control' type="text" name="staff_name" required value='<?php echo"$staff_name" ?>'>
                            </td>
                        </tr>


                        <tr>
                            <td style="font-weight: bold;">Change Password</td>
                            <td>
                                <input class = 'form-control' type="password" name="staff_pass" id="mypass" required
                                 value='<?php echo"$staff_pass"; ?>'>
                                 <input type="checkbox" onclick="show_password()"><strong>show password</strong>
                            </td>
                        </tr>


                        <tr>
                            <td style="font-weight: bold;">Gender</td>
                            <td>
                                <select id="" class="form-control" name="staff_gender">
                                    <option ><?php echo $staff_gender ?></option>
                                    <option >Male</option>
                                    <option >Female</option>
                                    <option >Others</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold;">Birth Day</td>
                            <td>
                                <input class = 'form-control' type="date" name="staff_birthday" required value='<?php echo"$staff_birthday" ?>' disabled>
                            </td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold; ">Forgotten Password</td>
                            <td>
                                <button type="button" class="btn btn-default" data-toggle='modal' data-target='#myModal'>Turn On</button>
                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Staff Query</h4>
                                            </div>
                                            <div class="modal-body">
                                            <!-- recovery.php?id=<?php //echo($user_id) ?> -->
                                                <form action="" method="post" id="f">
                                                    <strong>What is your School Best Friend Name?</strong>
                                                    <textarea name="content" id="" cols="83" rows="4" class="form-control"></textarea><br>
                                                    <input class="btn btn-default" type="submit" value = "Submit" name='sub' style="widows: 100px"><br><br>
                                                    <pre>Answer the above question, so that you can change password when you forget.</pre>
                                                </form>
                                                <?php
                                                    if(isset($_POST['sub'])){
                                                        $bfn = htmlentities($_POST['content']);

                                                        if($bfn == ""){
                                                            echo"alert('please enter something')";
                                                            echo"<script>window.open('edit_staff_profile.php?staff_id=$staff_id', '_self')</script>";
                                                            exit();
                                                        }else{
                                                            $update = "update staff set recovery_account = '$bfn' where staff_id='$staff_id'";
                                                            $run = mysqli_query($con, $update);
                                                            if($run){
                                                                echo"alert('Name Updated')";
                                                                echo"<script>window.open('edit_staff_profile.php?staff_id=$staff_id', '_self')</script>";
                                                            }else{
                                                                echo"alert('Error in updating')";
                                                                echo"<script>window.open('edit_staff_profile.php?staff_id=$staff_id', '_self')</script>";
                                                            }

                                                        }
                                                    }
                                                ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr align="center">
                            <td colspan="6">
                                <input type="submit" class="btn btn-info" name = 'update' style="width: 250px
                                ;" value="Update">
                            </td>
                        </tr>
                    </table>
                </form>
                
            </div>
            <div class="col-sm-2">
            </div>
        </div>
    </body>
</html>
<?php 
if(isset($_POST['update'])){
    if($_GET['staff_id']){
        $staff_id = $_GET['staff_id'];
    }

    $first_name = htmlentities($_POST['first_name']);
    $last_name = htmlentities($_POST['last_name']);
    $staff_name = htmlentities($_POST['staff_name']);
    $staff_pass = htmlentities($_POST['staff_pass']);
    
    $staff_gender = htmlentities($_POST['staff_gender']);
    

    $update = "update staff set first_name = '$first_name' , last_name ='$last_name', staff_name='$staff_name', 
      staff_pass='$staff_pass', staff_gender='$staff_gender' where staff_id = '$staff_id'";

    $run = mysqli_query($con, $update);
    
    if($run){
        echo"alert('Profile Updated')";
        echo"<script>window.open('edit_staff_profile.php?staff_id=$staff_id', '_self')</script>";
    }else{
        echo"alert('Error , unable to Update!')";
        echo"<script>window.open('edit_staff_profile.php?staff_id=$staff_id' , '_self')</script>";
    }
}
?>

<script>
function show_password(){
    var x = document.getElementById("mypass");
    if(x.type == "password"){
        x.type = "text";
    }
    else{
        x.type = "password";
    }
}
</script>