<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['admin_email'])){
    include("../config/admin_header.php");
}
else if(isset($_SESSION['student_email'])){
    include("../config/student_header.php");
}
else if(isset($_SESSION['staff_phone'])){
    include("../config/staff_header.php");
}
else{
    header("location:../index.php");
}

?>
<html>
    <head>
        <meta charset ="utf-8">
        <meta name="viewport" content="width=divice-width, initial-scale = 1.0">
        <title>Profile</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../style/home.css">
    </head>
    <style>
        body{
            overflow-x: hidden;
            background-image: url('../images/MegaTron.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }
        #own_posts{
            border:5px solid violet;
            padding: 40px 50px;
            width:90%;
        }
        #own_posts:hover{
            box-shadow: 5px 10px 8px 10px violet ;
        }
        #post-img{
            height: 300px;
            width:100%;
        }
    </style>
    <body>
        <div class="row">
            <?php
                if(isset($_GET['stu_id'])){
                    $stu_id = $_GET['stu_id'];
                }
                if($stu_id <= 0 || $stu_id=""){
                    echo"<script>window.open('student_home.php', '_self')</script>";
                }else{
                ?>
                <div class="col-sm-12">
                    <?php
                        global $con;
                        $student_id = $_GET['stu_id'];
                        $select = "select * from students where student_id='$student_id'";
                        $run = mysqli_query($con, $select);
                        $row = mysqli_fetch_array($run);

                        $id = $row['student_id'];
                        $student_image = $row['student_image'];
                        $name = $row['student_name'];
                        $email = $row['student_email'];
                        $first_name = $row['first_name'];
                        $last_name = $row['last_name'];
                        $roll_no = $row['roll_no'];
                        $student_phone = $row['student_phone'];
                        $student_gender = $row['student_gender'];
                        $register_date = $row['student_reg_date'];

                        echo"
                        <div class='row'>
                            <div class='col-sm-1'>
                            </div>
                            <center>
                            <div class='col-sm-3' style='background-color: #e6e6e6'>
                                <h2>Information About</h2>
                                <img src='../$student_image' alt='student image' class='img-circle' width='150px' height='150px'><br><br>
                                <ul class='list-group'>
                                    <li class='list-group-item' title='Username'><strong>$first_name $last_name</strong></li>
                                    <li class='list-group-item' title='Roll No'><strong>$roll_no</strong></li>
                                    <li class='list-group-item' title='Phone No'><strong>$student_phone</strong></li>
                                    <li class='list-group-item' title='Email'><strong>$email</strong></li>
                                    <li class='list-group-item' title='Gender'><strong>$student_gender</strong></li>
                                    <li class='list-group-item' title='Registered On'><strong>$register_date</strong></li>
                                </ul><br>
                            
                        ";
                        if(isset($_SESSION['student_email'])){
                            $student = $_SESSION['student_email'];
                            $get_student = "select * from students where student_email = '$student'";
                            $run_student =  mysqli_query($con, $get_student);
                            $row = mysqli_fetch_array($run_student);

                            $student_own_id = $row['student_id'];
                            if($id == $student_own_id){
                                echo"
                                <a href='edit_stu_profile.php?stu_id=$student_own_id' class='btn btn-success'>Edit Profile</a><br><br>
                                ";
                            }
                           
                        }
                        if(isset($_SESSION['admin_email'])){
                            $student_id = $_GET['stu_id'];
                            
                            echo"
                                <form action='' method='post'>
                                    <button class='btn btn-danger' name='absent' type='submit'>Mark Absent</button>
                                </form><br>
                            ";

                            echo"
                                <form action='' method='post'>
                                    <button class='btn btn-success' name='message' type='submit'>Messege Student</button>
                                </form>
                            ";

                            if(isset($_POST['message'])){
                                echo"<script>window.open('student_messeges.php?stu_id=$student_id', '_self')</script>";
                                
                            }
                            

                            if(isset($_POST['absent'])){

                                $select = "select * from attendance where date = CURDATE() and user_id = '$student_id'";
                                $run_select = mysqli_query($con, $select);
                                $num = mysqli_num_rows($run_select);
                                if($num == 1){
                                    echo("<script>alert('Already Student marked absent!')</script>");
                                }
                                else{
                                    $insert = "insert into attendance (user_id, user_type, date) values ('$student_id', 'student', CURDATE())";
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
                        echo"
                        </div>
                        </center>
                    ";
                    ?>
                    <div class="col-sm-8">
                        <center><h1><strong><?php echo"$first_name $last_name"; ?></strong></h1></center>
                        <?php
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
                                            <br>
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
                                            <br>
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
                                            <br>
                                        </div><br><br>
                                    ";
            
                                }
                                
                            }//end of while loop
                            echo"
                            </div>";
                        ?>
                    </div>

                    
                </div>

            <?php
                }
            ?>
        </div>
    </body>
</html>

    
</div>