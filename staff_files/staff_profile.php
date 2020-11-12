<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['staff_phone'])){
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
        <title>My Profile</title>
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
    }
	#cover-img{
		height: 400px;
		width: 100%;
	}#profile-img{
		position: absolute;
		top: 160px;
		left: 40px;
	}
	#update_profile{
		position: relative;
		top: -33px;
		cursor: pointer;
		left: 93px;
		border-radius: 4px;
		background-color: rgba(0,0,0,0.1);
		transform: translate(-50%, -50%);
	}
	#button_profile{
		position: absolute;
		top: 82%;
		left: 50%;
		cursor: pointer;
		transform: translate(-50%, -50%);
    }
    #own_posts{
        margin:10px;
        padding:10px;
        padding-right: 20px;
        border:2px solid grey;
        border-radius: 30px;
    }
    #own_posts:hover{
        box-shadow: 5px 10px 18px red;
    }
    .com{
        width: 100%;
        height: 60px;
        border:2px solid blue;
        border-radius: 30px;
        padding: auto;
        margin-top:5px;
    }
    .text{
        transform: translateY(+30%);
        font-size:25px;
    }
    .com:hover{
        background-color: rgba(0, 0, 255, 0.7);
        border:2px solid black;
        color:white;
    }
</style>
        <?php
            $staff_id = $_GET['staff_id'];
            $select = "select * from staff where staff_id = '$staff_id'";
            $run_select = mysqli_query($con, $select);
            $row_staff = mysqli_fetch_array($run_select);

            $first_name = $row_staff['first_name'];
            $last_name = $row_staff['last_name'];
            $staff_image = $row_staff['staff_image'];
            $staff_phone = $row_staff['staff_phone'];
            $staff_gender = $row_staff['staff_gender'];
            $staff_reg_date = $row_staff['staff_reg_date'];
            $staff_job = $row_staff['staff_job'];
            $staff_birthday = $row_staff['staff_birthday'];
        ?>
    <body>
        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8">
                <?php
                    echo"
                    <div>
                        <div><img id='cover-img' class='img-rounded' src='../images/cover.jpg' alt='cover'></div>
                    </div>
                    <div id='profile-img'>
                        <img src='../$staff_image' alt='Profile' class='img-circle' width='180px' height='185px'>
                        <form action='staff_profile.php?staff_id=$staff_id' method='post' enctype='multipart/form-data' id='f'>
                            <label id='update_profile'>Select Profile<input type='file' name='u_image' size='60'></label>
                            <br>
                            <button id='button_profile' name='update' class='btn btn-info'>Update Profile</button>
                        </form>
                    </div><br>
                    ";
                ?>
            </div><br>
            <div class="col-sm-2">
            </div>
        </div>
        <?php
		if(isset($_POST['update'])){

            $u_image = $_FILES['u_image']['name'];
            $image_tmp = $_FILES['u_image']['tmp_name'];
            $random_number = rand(1,100);

            if($u_image==''){
                echo "<script>alert('Please Select Profile Image on clicking on your profile image')</script>";
                echo "<script>window.open('staff_profile.php?staff_id=$staff_id' , '_self')</script>";
                exit();
            }else{
                move_uploaded_file($image_tmp, "../staff/$u_image.$random_number");
                $update = "update staff set staff_image='staff/$u_image.$random_number' where staff_id='$staff_id'";

                $run = mysqli_query($con, $update);

                if($run){
                echo "<script>alert('Your Profile Updated')</script>";
                echo "<script>window.open('staff_profile.php?staff_id=$staff_id' , '_self')</script>";
                }
            }

		}
    ?>
    
    <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-2">
            <div style="background-color: #e6e6e6;text-align: center;left: 0.9%;border-radius: 5px;">
                <?php
                echo"
                    <center><h2><strong>About</strong></h2></center>
                    <center><h4><strong>$first_name $last_name</strong></h4></center>
                    
                    <p><strong>Phone No:</strong><i style='color:grey;'>$staff_phone</i></p>
                    <strong>Job : </strong><p>$staff_job</p><br>
                    <p><strong>Member Since: </strong>$staff_reg_date</p><br>
                    <p><strong>Gender: </strong> $staff_gender</p><br>
                    <p><strong>Date of Birth: </strong> $staff_birthday</p><br>
                ";
                ?>
            </div>
            <br>
            <?php
                if(isset($_SESSION['admin_email'])){
                    $staff_id = $_GET['staff_id'];
                    
                    echo"
                        <form action='' method='post'>
                            <button class='btn btn-danger' name='absent' type='submit' style='width:100%'>Mark Absent</button>
                        </form>
                    ";
                    if(isset($_POST['absent'])){

                        $select = "select * from attendance where date = CURDATE() and user_id = '$staff_id'";
                        $run_select = mysqli_query($con, $select);
                        $num = mysqli_num_rows($run_select);
                        if($num == 1){
                            echo("<script>alert('Already Staff marked absent!')</script>");
                        }
                        else{
                            $insert = "insert into attendance (user_id, user_type, date) values ('$staff_id', 'staff', CURDATE())";
                            $run_insert = mysqli_query($con, $insert);
                            if(!$run_insert){
                                echo("<script>alert('unable to update attendance, something wrong in database')</script>");
                            }
                            else{
                                echo("<script>alert('User marked absent today')</script>");
                            }
                        }
                        
                    }
                    
                }
            ?>
        </div>
        <div class="col-sm-8">
            
        </div>
    </div>