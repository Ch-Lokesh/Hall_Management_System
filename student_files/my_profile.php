<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['student_email'])){
    include("../config/student_header.php");
}



if(!isset($_SESSION['student_email'])){
    header("location:../index.php");
}
?>
<html>
    <head>
        
        <meta charset ="utf-8">
        <meta name="viewport" content="width=divice-width, initial-scale = 1.0">
        <title><?php echo("$student_name") ?></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../style/home.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../style/footer.css" type="text/css">
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

    .btn{
        margin:5px 15px;
    }
    </style>
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
                    <img src='../$student_image' alt='Profile' class='img-circle' width='180px' height='185px'>
                    <form action='my_profile.php?stu_id=$student_id' method='post' enctype='multipart/form-data' id='f'>
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
                echo "<script>alert('Please Select Profile Image and then click on update button')</script>";
                echo "<script>window.open('my_profile.php?stu_id=$student_id' , '_self')</script>";
                exit();
            }else{
                move_uploaded_file($image_tmp, "../students/$u_image.$random_number");
                $update = "update students set student_image='students/$u_image.$random_number' where student_id='$student_id'";

                $run = mysqli_query($con, $update);

                if($run){
                echo "<script>alert('Your Profile Updated')</script>";
                echo "<script>window.open('my_profile.php?stu_id=$student_id' , '_self')</script>";
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
                    <p><strong><i style='color:grey;'>$roll_no</i></strong></p><br>
                    <p><strong>Phone No:</strong><i style='color:grey;'>$student_phone</i></p>
                    <strong>Email:</strong><p>$student_email</p><br>
                    <p><strong>Member Since: </strong>$student_reg_date</p><br>
                    <p><strong>Gender: </strong> $student_gender</p><br>
                    <p><strong>Date of Birth: </strong> $student_birthday</p><br>
                ";
                ?>
            </div>
            <div class="com" style="text-align: center" id="complaints">
                <center class="text">Complaints</center>
            </div>
            <script>
                document.getElementById("complaints").onclick = function(){
                    window.open('seecomplaints.php?stu_id=<?php echo("$student_id"); ?>', '_self');
                }
            </script>
        </div>
        <div class="col-sm-6">
            <?php
                global $con;

                if(isset($_GET['stu_id'])){
                    $stu_id = $_GET['stu_id'];
                }
                $get_posts = "select * from posts where student_id='$stu_id' ORDER by 1 DESC LIMIT 5";
                $run_posts = mysqli_query($con, $get_posts);

                while($row_posts  = mysqli_fetch_array($run_posts)){

                    $post_id = $row_posts['post_id'];
                    $student_id = $row_posts['student_id'];
                    $content = substr($row_posts['post_content'], 0, 40);
                    $post_image = $row_posts['post_image'];
                    $post_date = $row_posts['post_date'];
            
                    $student = "select * from students where student_id = '$student_id' AND student_posts = 'yes'";
                    $run_student = mysqli_query($con, $student);
                    $row_student = mysqli_fetch_array($run_student);
            
                    $student_name = $row_student['student_name'];
                    $student_image = $row_student['student_image'];


                    if($content == "" && strlen($post_image) >= 1){
                        echo"
                            <div id='own_posts'>
                                <div class='row'>
                                    <div class='col-sm-2'>
                                        <p><img src='../$student_image' class='img-circle' width = '100px'
                                            height='100px' alt='student image'></p>
                                    </div>
                                    <div class='col-sm-6'>
                                        <h3><a style='text-decoration:none ; cursor:pointer; color: #3897f0;'
                                        href='student_profile.php?stu_id=$student_id'>$student_name</a></h3>
                                        <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                                    </div>
                                    <div class='col-sm-4'>
                                    </div>
                                </div><br>
                                <div class='row'>
                                    <div class='col-sm-12'>
                                        <img src='../imagepost/$post_image' alt='uploaded image' id='posts-img' style='height: 350px'>
                                    </div>
                                </div><br>
                                <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-success'>View</button></a>
                                <a href='../functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a><br><br>
                                
                                
                            </div><br><br>
                        ";
                    }

                    else if(strlen($content) >= 1 && strlen($post_image) >=1){
                        echo"
                            <div id='own_posts'>
                                <div class='row'>
                                    <div class='col-sm-2'>
                                        <p><img src='../$student_image' class='img-circle' width = '100px'
                                            height='100px' alt='student image'></p>
                                    </div>
                                    <div class='col-sm-6'>
                                        <h3><a style='text-decoration:none ; cursor:pointer; color: #3897f0;'
                                        href='student_profile.php?stu_id=$student_id'>$student_name</a></h3>
                                        <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                                    </div>
                                    <div class='col-sm-4'>
                                    </div>
                                </div><br>
                                <div class='row'>
                                    <div class='col-sm-12'>
                                    <h3><p>$content</p></h3>
                                        <img src='../imagepost/$post_image' alt='uploaded image' id='posts-img' style='height: 350px'>
                                    </div>
                                </div><br>
                                <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-success'>View</button></a>
                                <a href='../functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a>
                                <a href='edit_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Edit</button></a><br><br>
                            </div><br><br>
                        ";
                    }
                    else{
                        echo"
                            <div id='own_posts'>
                                <div class='row'>
                                    <div class='col-sm-2'>
                                        <p><img src='../$student_image' class='img-circle' width = '100px'
                                            height='100px' alt='student image'></p>
                                    </div>
                                    <div class='col-sm-6'>
                                        <h3><a style='text-decoration:none ; cursor:pointer; color: #3897f0;'
                                        href='student_profile.php?stu_id=$student_id'>$student_name</a></h3>
                                        <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                                    </div>
                                    <div class='col-sm-4'>
                                    </div>
                                </div><br>
                                <div class='row'>
                                    <div class='col-sm-12'>
                                        <h3><p>$content</p></h3>
                                    </div>
                                </div><br>
                                <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-success'>View</button></a>
                                <a href='../functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a>
                                <a href='edit_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Edit</button></a><br><br>
                            </div><br><br>
                        ";

                        

                    }
                    include("../functions/delete_post.php");
                }//end of while loop
            ?>
        </div>
        <div class="col-sm-2">
        </div>     
    </div>
    <?php include('../config/footer.php'); ?>
