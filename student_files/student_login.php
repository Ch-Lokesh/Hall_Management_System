<?php
    session_start();
    include("../config/configure.php");
    if(isset($_POST['stu_sign_in'])){
        $student_email = htmlentities(mysqli_real_escape_string($con, $_POST['student_email']));
        $student_pass = htmlentities(mysqli_real_escape_string($con, $_POST['student_pass']));

        $select_students = "select * from students where student_email = '$student_email'
        AND student_pass='$student_pass' AND status='verified'";

        $query = mysqli_query($con, $select_students);
        $check_students = mysqli_num_rows($query);

        if($check_students == 1){
            $_SESSION['student_email'] = $student_email;
            echo"<script>window.open('student_home.php', '_self')</script>";
        }
        else{
            echo "<script>alert('Your Email or Password is incorrect')</script>";
        }
    }

?>