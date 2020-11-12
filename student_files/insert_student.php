<?php
    include("../config/configure.php");
    if(isset($_POST['stu_sign_up'])){
        $first_name = htmlentities(mysqli_real_escape_string($con, $_POST['first_name']));
        $last_name = htmlentities(mysqli_real_escape_string($con, $_POST['last_name']));
        $student_pass = htmlentities(mysqli_real_escape_string($con, $_POST['student_pass']));
        $student_pass1 = htmlentities(mysqli_real_escape_string($con, $_POST['student_pass1']));
        $student_email = htmlentities(mysqli_real_escape_string($con, $_POST['student_email']));
        $student_birthday = htmlentities(mysqli_real_escape_string($con, $_POST['student_birthday']));
        $student_phone = htmlentities(mysqli_real_escape_string($con, $_POST['student_phone']));
        $student_gender = htmlentities(mysqli_real_escape_string($con, $_POST['student_gender']));
        $roll_no = htmlentities(mysqli_real_escape_string($con, $_POST['roll_no']));
        $status = "verified";
        $student_posts = "no";
        $student_rep = "no";
        $recovery_account = "admin";

        $student_name = strtolower($first_name . '_' . $last_name);

        $check_username_query = "select student_name from students where student_email = '$student_email'";
        $run_username = mysqli_query($con, $check_username_query);

        if(strlen($student_pass) < 6){
            echo"<script>alert('password should be minimum 6 charecters!')</script>";
            exit();
        }
        if($student_pass != $student_pass1){
            echo"<script>alert('second password didn't match with first, try again!)</script>";
            exit();
        }

        $check_email = "select * from students where student_email = '$student_email'";
        $run_email = mysqli_query($con, $check_email);
        $check = mysqli_num_rows($run_email);

        if($check >= 1){
            echo"<script>alert('Email already exists, please try another email')</script>";
            echo"<script>window.open('signupStudent.php', '_self')</script>";
            exit();
        }

        $rand = rand(1, 3);
        if($rand == 1){
            $student_image = 'students/student1.png';
        }
        else if($rand == 2){
            $student_image = 'students/student2.png';
        }
        else{
            $student_image = 'students/student3.png';
        }

        $insert = "insert into students (first_name, last_name, student_name, roll_no,
        student_pass, student_email, student_phone, student_birthday, student_image, 
        student_posts, student_rep, student_gender, student_reg_date, recovery_account, status)
        values('$first_name', '$last_name', '$student_name', '$roll_no',
        '$student_pass', '$student_email', '$student_phone', '$student_birthday', '$student_image', 
        '$student_posts', '$student_rep', '$student_gender', NOW(), '$recovery_account', '$status')";

        $insert_query = mysqli_query($con, $insert);
        if($insert_query){
            echo"<script>alert('$first_name, your registration is completed')</script>";
            echo"<script>window.open('signinStudent.php', '_self')</script>";
        }
        else{
            echo"<script>alert('your registration failed')</script>";
            echo"<script>window.open('signupStudent.php', '_self')</script>";
        }
    }
?>